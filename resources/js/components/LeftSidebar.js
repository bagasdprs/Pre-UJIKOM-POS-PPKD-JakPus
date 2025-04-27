import React from 'react';
import web from '../utils/web';

const LeftSidebar = () => {
    const logout = async () => {
        if (confirm('Are you sure you want to log out?')) {
            try {
                const response = await web.post('/logout');
                if (response.status === 204) {
                    window.location.reload();
                } else {
                    alert('Logout error. Please refresh your browser.');
                    console.log(response);
                }
            } catch (error) {
                alert('Logout error. Please refresh your browser.');
                console.error(error);
            }
        }
    };

    return (
        <div className="w-30 bg-blue-gray-50 flex flex-row flex-shrink-0 pl-4 pr-2 py-4">
            <div className="flex flex-col items-center py-4 flex-shrink-0 w-20 bg-cyan-500 rounded-3xl">
                <a href="/" className="flex items-center justify-center h-12 w-12 bg-cyan-50 text-cyan-700 rounded-full">
                    <img src="img/logo.png" alt="Logo" />
                </a>
                <ul className="flex flex-col space-y-2 mt-12">

                    {/* Dashboard */}
                    <li>
                        <a href="/" className="flex items-center">
                            <span className="flex items-center justify-center h-12 w-12 rounded-2xl bg-cyan-300 shadow-lg text-white">
                                {/* SVG Dashboard Icon */}
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </a>
                    </li>

                    {/* Products */}
                    <li>
                        <a href="/admin/products" className="flex items-center">
                            <span className="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                {/* SVG Product Icon */}
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12h.01M9 16h.01M12 12h3m-3 4h3" />
                                </svg>
                            </span>
                        </a>
                    </li>

                    {/* Transactions */}
                    <li>
                        <a href="/admin/transactions" className="flex items-center">
                            <span className="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                {/* SVG Transactions Icon */}
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </span>
                        </a>
                    </li>

                     {/* Add User Page (Newly Added) */}
                     <li>
                        <a href="/admin/users" className="flex items-center">
                            <span className="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-3 5a4 4 0 11-8 0 4 4 0 018 0zm4-4a4 4 0 10-8 0 4 4 0 008 0z" />
                                </svg>
                            </span>
                        </a>
                    </li>

                    {/* Settings */}
                    <li>
                        <a href="/admin/settings" className="flex items-center">
                            <span className="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                {/* SVG Settings Icon */}
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>

                {/* Bottom Menu */}
                <ul className="flex flex-col space-y-2 mt-auto">
                    <li>
                        <button onClick={logout} type="button" className="flex items-center justify-center text-cyan-200 hover:bg-cyan-400 rounded-2xl h-12 w-12 focus:outline-none">
                            {/* SVG Logout Icon */}
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fillRule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clipRule="evenodd" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <a href="https://github.com/herilesmana/actiry-pos" target="_blank" rel="noopener noreferrer" className="flex items-center justify-center text-cyan-200 hover:text-cyan-100 h-12 w-12">
                            {/* GitHub Icon */}
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path fillRule="evenodd" d="M10 2a8 8 0 00-2.534 15.605c.4.073.546-.173.546-.385v-1.356c-2.22.483-2.695-1.07-2.695-1.07-.364-.924-.89-1.17-.89-1.17-.727-.497.055-.487.055-.487.803.057 1.226.825 1.226.825.715 1.223 1.875.87 2.33.666.072-.518.28-.87.507-1.07-1.777-.202-3.644-.888-3.644-3.956 0-.874.31-1.588.824-2.148-.083-.203-.357-1.018.078-2.12 0 0 .672-.215 2.2.82a7.673 7.673 0 014 0c1.528-1.035 2.2-.82 2.2-.82.435 1.102.16 1.917.078 2.12.515.56.824 1.274.824 2.148 0 3.077-1.868 3.75-3.648 3.95.288.248.543.735.543 1.482v2.197c0 .214.144.46.55.383A8.001 8.001 0 0010 2z" clipRule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    );
};

export default LeftSidebar;
