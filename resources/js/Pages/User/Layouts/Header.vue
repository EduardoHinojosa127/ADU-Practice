<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);
</script>
<template>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <Link :href="route('home')" class="flex items-center">
                <svg
                    width="30px"
                    height="30px"
                    viewBox="0 0 800 800"
                    enable-background="new 0 0 800 800"
                    id="GUIDE"
                    version="1.1"
                    xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:cc="http://creativecommons.org/ns#"
                    xmlns:dc="http://purl.org/dc/elements/1.1/"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns:svg="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                    <g>
                        <path
                            d="M676.637,183.386c0.002-0.002,0.004-0.004,0.005-0.005L522.549,29.287c-3.619-3.62-8.62-5.86-14.145-5.86H137.5   c-11.046,0-20,8.954-20,20v713.146c0,11.046,8.954,20,20,20h525c11.046,0,20-8.954,20-20V197.522   C682.5,192.407,680.426,187.203,676.637,183.386z M642.5,736.573h-485V63.427h342.62l114.096,114.095l-85.812,0v-41.788   c0-11.046-8.954-20-20-20s-20,8.954-20,20v61.788c0,11.046,8.954,20,20,20c0,0,92.404,0,134.096,0V736.573z"
                        />

                        <path
                            d="M295.217,224.417l-39.854,39.855l-5.697-5.697c-7.811-7.811-20.473-7.811-28.283,0c-7.811,7.81-7.811,20.473,0,28.284   l19.84,19.84c3.75,3.751,8.838,5.858,14.142,5.858c5.305,0,10.392-2.107,14.143-5.858l53.996-53.999   c7.81-7.811,7.81-20.474-0.001-28.284C315.69,216.606,303.027,216.606,295.217,224.417z"
                        />

                        <path
                            d="M557.831,312.557h6.646c11.046,0,20-8.954,20-20s-8.954-20-20-20h-6.646c-11.046,0-20,8.954-20,20   S546.785,312.557,557.831,312.557z"
                        />

                        <path
                            d="M367.389,272.557c-11.046,0-20,8.954-20,20s8.954,20,20,20h129.609c11.046,0,20-8.954,20-20s-8.954-20-20-20H367.389z"
                        />

                        <path
                            d="M557.831,435.552h6.646c11.046,0,20-8.954,20-20s-8.954-20-20-20h-6.646c-11.046,0-20,8.954-20,20   S546.785,435.552,557.831,435.552z"
                        />

                        <path
                            d="M496.998,395.552H367.389c-11.046,0-20,8.954-20,20s8.954,20,20,20h129.609c11.046,0,20-8.954,20-20   S508.044,395.552,496.998,395.552z"
                        />

                        <path
                            d="M557.831,558.547h6.646c11.046,0,20-8.954,20-20s-8.954-20-20-20h-6.646c-11.046,0-20,8.954-20,20   S546.785,558.547,557.831,558.547z"
                        />

                        <path
                            d="M496.998,518.547H367.389c-11.046,0-20,8.954-20,20s8.954,20,20,20h129.609c11.046,0,20-8.954,20-20   S508.044,518.547,496.998,518.547z"
                        />

                        <path
                            d="M557.831,681.542h6.646c11.046,0,20-8.954,20-20s-8.954-20-20-20h-6.646c-11.046,0-20,8.954-20,20   S546.785,681.542,557.831,681.542z"
                        />

                        <path
                            d="M496.998,641.542H367.389c-11.046,0-20,8.954-20,20s8.954,20,20,20h129.609c11.046,0,20-8.954,20-20   S508.044,641.542,496.998,641.542z"
                        />

                        <path
                            d="M255.363,435.552c5.304,0,10.392-2.107,14.142-5.858l53.996-53.996c7.811-7.811,7.811-20.475,0-28.285   s-20.473-7.811-28.283,0l-39.854,39.855l-5.697-5.698c-7.81-7.81-20.474-7.812-28.284-0.001s-7.811,20.474-0.001,28.284   l19.84,19.841C244.972,433.444,250.059,435.552,255.363,435.552z"
                        />

                        <path
                            d="M234.239,511.547l-12.856,12.857c-7.81,7.811-7.81,20.474,0.001,28.284c3.905,3.905,9.023,5.857,14.142,5.857   s10.237-1.952,14.143-5.858l12.855-12.855l12.856,12.855c3.904,3.906,9.023,5.858,14.142,5.858s10.237-1.952,14.142-5.858   c7.811-7.811,7.811-20.473,0-28.283l-12.855-12.857l12.856-12.857c7.81-7.811,7.81-20.474-0.001-28.284   c-7.811-7.81-20.474-7.81-28.284,0.001l-12.856,12.856l-12.857-12.856c-7.811-7.811-20.473-7.811-28.283,0s-7.811,20.474,0,28.283   L234.239,511.547z"
                        />

                        <path
                            d="M295.217,593.4l-39.854,39.855l-5.697-5.697c-7.811-7.811-20.473-7.811-28.283,0c-7.811,7.81-7.811,20.473,0,28.283   l19.84,19.84c3.75,3.752,8.838,5.858,14.142,5.858c5.305,0,10.392-2.107,14.143-5.858l53.996-53.998   c7.81-7.811,7.81-20.474-0.001-28.284C315.69,585.59,303.027,585.59,295.217,593.4z"
                        />
                    </g>
                </svg>
                <span
                    class="self-center text-lg ml-2 font-semibold whitespace-nowrap dark:text-white"
                    >ADU: Cursos Prácticos</span
                >
            </Link>
            <div v-if="canLogin" class="flex items-center md:order-2">
                <button
                    v-if="auth.user"
                    type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button"
                    aria-expanded="false"
                    data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom"
                >
                    <span class="sr-only">Open user menu</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        class="w-8 h-8 rounded-full bg-white"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                        />
                    </svg>
                </button>
                <div v-else>
                    <Link
                        :href="route('login')"
                        type="button"
                        class="text-white bg-gradient-to-br from-green-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    >
                        Iniciar Sesión
                    </Link>
                    <Link
                        :href="route('register')"
                        v-if="canRegister"
                        type="button"
                        class="text-white bg-gradient-to-r from-green-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    >
                        Registrarse
                    </Link>
                </div>

                <!-- Dropdown menu -->
                <div
                    v-if="auth.user"
                    class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown"
                >
                    <div class="px-4 py-3">
                        <span
                            class="block text-sm text-gray-900 dark:text-white"
                            >{{ auth.user.name }}</span
                        >
                        <span
                            class="block text-sm text-gray-500 truncate dark:text-gray-400"
                            >{{ auth.user.email }}</span
                        >
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <Link
                                :href="route('logout')"
                                method="post"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                            >
                                Cerrar Sesión</Link
                            >
                        </li>
                    </ul>
                </div>
                <button
                    data-collapse-toggle="navbar-user"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 17 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"
                        />
                    </svg>
                </button>
            </div>
            <div
                class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                id="navbar-user"
            >
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <li>
                        <Link
                            :href="route('home')"
                            :class="[
                                'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                                {
                                    'md:text-blue-700': route().current('home'),
                                },
                            ]"
                            aria-current="page"
                            >Inicio</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="
                                $page.props.auth.user?.role === 'admin'
                                    ? route('evaluations.index.admin')
                                    : route('evaluations.index')
                            "
                            :class="[
                                'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                                {
                                    'md:text-blue-700':
                                        route().current('evaluations.index') ||
                                        route().current('evaluations.quiz') ||
                                        route().current(
                                            'evaluations.index.admin'
                                        ),
                                },
                            ]"
                            aria-current="page"
                            >Exámenes</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('interpretation')"
                            :class="[
                                'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                                {
                                    'md:text-blue-700':
                                        route().current('interpretation'),
                                },
                            ]"
                            aria-current="page"
                            >Interpretación</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
