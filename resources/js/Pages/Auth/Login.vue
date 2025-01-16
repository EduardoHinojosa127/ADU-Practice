<script setup>
import { useForm, Link } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <div
    class="min-h-screen flex items-center justify-center bg-gradient-to-r from-green-500 via-teal-400 to-blue-500"
    >
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center text-[#1cbeec] mb-6">
                Iniciar sesión
            </h1>
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-gray-700 font-medium mb-2"
                        >Correo Electrónico</label
                    >
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="w-full border-b-2 border-gray-300 focus:border-blue-500 text-gray-700 focus:outline-none bg-transparent rounded-md shadow-sm"
                        required
                    />
                    <span
                        v-if="form.errors.email"
                        class="text-red-500 text-sm"
                        >{{ form.errors.email }}</span
                    >
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="block text-gray-700 font-medium mb-2"
                        >Contraseña</label
                    >
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="w-full border-b-2 border-gray-300 focus:border-blue-500 text-gray-700 focus:outline-none bg-transparent rounded-md shadow-sm"
                        required
                    />
                    <span
                        v-if="form.errors.password"
                        class="text-red-500 text-sm"
                        >{{ form.errors.password }}</span
                    >
                </div>

                <div class="mb-6 flex items-center justify-between">
                    <label class="flex items-center">
                        <input
                            v-model="form.remember"
                            type="checkbox"
                            class="form-checkbox text-[#2563EB] focus:ring-[#2563EB] focus:outline-none"
                        />
                        <span class="ml-2 text-gray-700 text-sm"
                            >Recordarme</span
                        >
                    </label>

                    <span class="text-sm text-gray-700">
                        ¿No tiene cuenta?
                        <Link
                            :href="route('register')"
                            class="text-[#1cbeec] font-semibold hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB]"
                        >
                            Registrarse
                        </Link>
                    </span>
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full bg-[#1cbeec] hover:bg-[#14bcc4] text-white font-bold py-2 px-4 rounded-lg transition-colors"
                    >
                        Iniciar sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
body {
    margin: 0;
    font-family: "Arial", sans-serif;
}
</style>
