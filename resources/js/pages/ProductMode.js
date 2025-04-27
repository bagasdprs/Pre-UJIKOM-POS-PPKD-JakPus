// export default ProductMode
import React, { useState, useEffect, useCallback } from 'react';
import web from '../utils/web';
import { priceFormat } from '../utils/helper';
import { debounce } from 'lodash';
import ContentLoader from 'react-content-loader';

const ProductMode = ({ addToCart }) => {
  const [products, setProducts] = useState([]);
  const [filteredProducts, setFilteredProducts] = useState([]);
  const [search, setSearch] = useState('');
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState('');

  const fetchData = async () => {
    setIsLoading(true);
    try {
      const { data } = await web('/products');
      setProducts(data);
      setFilteredProducts(data);
      setError('');
    } catch (err) {
      console.error('Error fetching products:', err);
      setError('Failed to load products. Please try again.');
    } finally {
      setIsLoading(false);
    }
  };

  useEffect(() => {
    fetchData();
  }, []);

  // Debounce pencarian supaya lebih smooth
  const handleSearch = useCallback(
    debounce((query) => {
      if (query) {
        const filtered = products.filter((item) =>
          item.name.toLowerCase().includes(query.toLowerCase())
        );
        setFilteredProducts(filtered);
      } else {
        setFilteredProducts(products);
      }
    }, 500), // delay 500ms
    [products]
  );

  const onSearchChange = (e) => {
    const value = e.target.value;
    setSearch(value);
    handleSearch(value);
  };

  const ProductLoading = (props) => (
    <ContentLoader
      height={300}
      backgroundColor="#ffffff"
      foregroundColor="#f0f0f0"
      {...props}
    >
      <rect x="0" y="235" rx="4" ry="4" width="100" height="9" />
      <rect x="160" y="235" rx="3" ry="3" width="100" height="9" />
      <rect x="0" y="10" rx="10" ry="10" width="300" height="217" />
    </ContentLoader>
  );

  return (
    <div className="w-6/12 flex-grow flex">
      <div className="flex flex-col bg-blue-gray-50 h-full w-full py-4">
        <div className="flex px-2 relative">
          <div className="absolute left-5 top-3 px-2 py-2 rounded-full bg-cyan-500 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <input
            value={search}
            onChange={onSearchChange}
            type="text"
            className="bg-white rounded-3xl shadow text-lg w-full h-16 py-4 pl-16 transition-shadow focus:shadow-2xl focus:outline-none"
            placeholder="Cari menu ..."
          />
        </div>

        <div className="h-full overflow-hidden mt-4">
          <div className="h-full overflow-y-auto px-2">

            {error && (
              <EmptyState message={error} />
            )}

            {isLoading ? (
              <div className="grid grid-cols-4 gap-4 pb-1">
                {Array.from({ length: 8 }).map((_, index) => (
                  <ProductLoading key={index} className="w-full" />
                ))}
              </div>
            ) : filteredProducts.length === 0 ? (
              <EmptyState message="No products found." />
            ) : (
              <div className="grid grid-cols-4 gap-4 pb-3">
                {filteredProducts.map((item) => (
                  <div
                    key={item.id}
                    onClick={() => addToCart(item)}
                    role="button"
                    className="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl bg-white shadow hover:shadow-lg"
                  >
                    <div className="w-full h-72">
                      <img
                        src={item.image}
                        alt={item.name}
                        className="object-cover w-full h-full"
                      />
                    </div>
                    <div className="flex pb-3 px-3 text-sm -mt-3">
                      <p className="flex-grow truncate mr-1">{item.name}</p>
                      <p className="whitespace-nowrap font-semibold">{priceFormat(item.price)}</p>
                    </div>
                  </div>
                ))}
              </div>
            )}

          </div>
        </div>

      </div>
    </div>
  );
};

const EmptyState = ({ message }) => (
  <div className="select-none bg-blue-gray-100 rounded-3xl flex flex-wrap content-center justify-center h-full opacity-25">
    <div className="w-full text-center">
      <svg xmlns="http://www.w3.org/2000/svg" className="h-24 w-24 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
      <p className="text-xl">{message}</p>
    </div>
  </div>
);

export default ProductMode;
