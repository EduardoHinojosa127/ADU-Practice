<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: "",
    lastname: "",
    email: "",
    password: "",
    password_confirmation: "",
    country: "",
    region: "",
    province: "",
    study_program: "",
    professional_years: "",
    institution: "",
    age: "",
    gender: "",
});

function clear (){
    form.province = "";
    form.region = "";
}

const countries = [
  "Argentina",
  "Bolivia",
  "Brasil",
  "Chile",
  "Colombia",
  "Costa Rica",
  "Cuba",
  "Ecuador",
  "El Salvador",
  "Guatemala",
  "Honduras",
  "México",
  "Nicaragua",
  "Panamá",
  "Paraguay",
  "Perú",
  "República Dominicana",
  "Uruguay",
  "Venezuela"
];

const regions = {
    Amazonas: [
        "Bagua",
        "Bongará",
        "Chachapoyas",
        "Condorcanqui",
        "Luya",
        "Rodríguez de Mendoza",
        "Utcubamba",
    ],
    Áncash: [
        "Aija",
        "Antonio Raymondi",
        "Asunción",
        "Bolognesi",
        "Carhuaz",
        "Carlos Fermín Fitzcarrald",
        "Casma",
        "Corongo",
        "Huaraz",
        "Huari",
        "Huarmey",
        "Huaylas",
        "Mariscal Luzuriaga",
        "Ocros",
        "Pallasca",
        "Pomabamba",
        "Recuay",
        "Santa",
        "Sihuas",
        "Yungay",
    ],
    Apurímac: [
        "Abancay",
        "Andahuaylas",
        "Antabamba",
        "Aymaraes",
        "Cotabambas",
        "Chincheros",
        "Grau",
    ],
    Arequipa: [
        "Arequipa",
        "Camana",
        "Caraveli",
        "Castilla",
        "Caylloma",
        "Condesuyos",
        "Islay",
        "La Unión",
    ],
    Ayacucho: [
        "Cangallo",
        "Huamanga",
        "Huanca Sancos",
        "Huanta",
        "La Mar",
        "Lucanas",
        "Parinacochas",
        "Paucar del Sara Sara",
        "Sucre",
        "Víctor Fajardo",
        "Vilcas Huamán",
    ],
    Cajamarca: [
        "Cajabamba",
        "Cajamarca",
        "Celendín",
        "Chota",
        "Contumazá",
        "Cutervo",
        "Hualgayoc",
        "Jaén",
        "San Ignacio",
        "San Marcos",
        "San Miguel",
        "San Pablo",
        "Santa Cruz",
    ],
    Callao: ["Callao"],
    Cusco: [
        "Acomayo",
        "Anta",
        "Calca",
        "Canas",
        "Canchis",
        "Chumbivilcas",
        "Cusco",
        "Espinar",
        "La Convención",
        "Paruro",
        "Paucartambo",
        "Quispicanchi",
        "Urubamba",
    ],
    Huancavelica: [
        "Acobamba",
        "Angaraes",
        "Castrovirreyna",
        "Churcampa",
        "Huancavelica",
        "Huaytará",
        "Tayacaja",
    ],
    Huánuco: [
        "Ambo",
        "Dos de Mayo",
        "Huacaybamba",
        "Huamalíes",
        "Huánuco",
        "Lauricocha",
        "Leoncio Prado",
        "Marañón",
        "Pachitea",
        "Puerto Inca",
        "Yarowilca",
    ],
    Ica: ["Chincha", "Ica", "Nazca", "Palpa", "Pisco"],
    Junín: [
        "Chanchamayo",
        "Chupaca",
        "Concepción",
        "Huancayo",
        "Jauja",
        "Junín",
        "Satipo",
        "Tarma",
        "Yauli",
    ],
    "La Libertad": [
        "Ascope",
        "Bolívar",
        "Chepén",
        "Gran Chimú",
        "Julcán",
        "Otuzco",
        "Pacasmayo",
        "Pataz",
        "Sánchez Carrión",
        "Santiago de Chuco",
        "Trujillo",
        "Virú",
    ],
    Lambayeque: ["Chiclayo", "Ferreñafe", "Lambayeque"],
    Lima: [
        "Barranca",
        "Cajatambo",
        "Canta",
        "Cañete",
        "Huaral",
        "Huarochirí",
        "Huaura",
        "Lima",
        "Oyón",
        "Yauyos",
    ],
    Loreto: [
        "Alto Amazonas",
        "Datem del Marañón",
        "Loreto",
        "Mariscal Ramón Castilla",
        "Maynas",
        "Putumayo",
        "Requena",
        "Ucayali",
    ],
    "Madre de Dios": ["Manu", "Tambopata", "Tahuamanu"],
    Moquegua: ["General Sánchez Cerro", "Ilo", "Mariscal Nieto"],
    Pasco: ["Daniel Alcides Carrión", "Oxapampa", "Pasco"],
    Piura: [
        "Ayabaca",
        "Huancabamba",
        "Morropón",
        "Paita",
        "Piura",
        "Sechura",
        "Sullana",
        "Talara",
    ],
    Puno: [
        "Azángaro",
        "Carabaya",
        "Chucuito",
        "El Collao",
        "Huancané",
        "Lampa",
        "Melgar",
        "Moho",
        "Puno",
        "San Antonio de Putina",
        "San Román",
        "Sandia",
        "Yunguyo",
    ],
    "San Martín": [
        "Bellavista",
        "El Dorado",
        "Huallaga",
        "Lamas",
        "Mariscal Cáceres",
        "Moyobamba",
        "Picota",
        "Rioja",
        "San Martín",
        "Tocache",
    ],
    Tacna: ["Candarave", "Jorge Basadre", "Tacna", "Tarata"],
    Tumbes: ["Contralmirante Villar", "Tumbes", "Zarumilla"],
    Ucayali: ["Atalaya", "Coronel Portillo", "Padre Abad", "Purús"],
};

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div
    class="min-h-screen flex items-center justify-center bg-gradient-to-r from-green-500 via-teal-400 to-blue-500"
    >
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
            <h1 class="text-2xl font-bold text-center text-[#1cbeec] mb-6">
                Registarse
            </h1>
            <form @submit.prevent="submit">
                <!-- Nombre -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Nombre -->
                    <div>
                        <InputLabel for="name" value="Nombre" />
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <!-- Apellido -->
                    <div>
                        <InputLabel for="lastname" value="Apellidos" />
                        <TextInput
                            id="lastname"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.lastname"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.lastname"
                        />
                    </div>

                    <!-- Email -->
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <InputLabel for="password" value="Contraseña" />
                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div>
                        <InputLabel
                            for="password_confirmation"
                            value="Confirmar Contraseña"
                        />
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>
                </div>

                <hr />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mt-4">
                    <!-- Nombre -->

                    
                    <div>
                        <InputLabel for="country" value="País" />
                        <select
                            id="country"
                            @change="clear"

                            class="w-full border-b-2 border-gray-300 focus:border-blue-500 text-gray-700 focus:outline-none bg-transparent rounded-md shadow-sm"
                            v-model="form.country"
                            required
                        >
                            <option value="" disabled>
                                Seleccione una opción
                            </option>
                            <option
                                v-for="item in countries"
                                :key="item"
                                :value="item"
                            >
                                {{ item }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.country"
                        />
                    </div>

                    <div v-if="form.country === 'Perú'">
                        <InputLabel for="region" value="Región" />
                        <select
                            id="region"
                            class="w-full border-b-2 border-gray-300 focus:border-blue-500 text-gray-700 focus:outline-none bg-transparent rounded-md shadow-sm"
                            v-model="form.region"
                            required
                        >
                            <option value="" disabled>
                                Seleccione una opción
                            </option>
                            <option
                                v-for="(province, region) in regions"
                                :key="region"
                                :value="region"
                            >
                                {{ region }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.region"
                        />
                    </div>

                    <div v-if="form.country === 'Perú'">
                        <InputLabel for="province" value="Provincia" />
                        <select
                            id="province"
                            class="w-full border-b-2 border-gray-300 focus:border-blue-500 text-gray-700 focus:outline-none bg-transparent rounded-md shadow-sm"
                            v-model="form.province"
                            required
                        >
                            <option value="" disabled>
                                Seleccione una opción
                            </option>
                            <option
                                v-for="provincia in regions[
                                    form.region
                                ] || []"
                                :key="provincia"
                                :value="provincia"
                            >
                                {{ provincia }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.province"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="study_program"
                            value="Programa de estudios que enseña mayormente"
                        />
                        <TextInput
                            id="study_program"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.study_program"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.study_program"
                        />
                    </div>
                    <div>
                        <InputLabel
                            for="professional_years"
                            value="Años laborando como profesor universitario"
                        />
                        <TextInput
                            id="professional_years"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.professional_years"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.professional_years"
                        />
                    </div>
                    <div>
                        <InputLabel
                            for="institution"
                            value="Institución donde enseña"
                        />
                        <TextInput
                            id="institution"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.institution"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.institution"
                        />
                    </div>
                    <div>
                        <InputLabel for="age" value="Edad" />
                        <TextInput
                            id="age"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.age"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.age" />
                    </div>
                    <div>
                        <InputLabel for="gender" value="Sexo" />
                        <select
                            id="gender"
                            class="w-full border-b-2 border-gray-300 focus:border-blue-500 text-gray-700 focus:outline-none bg-transparent rounded-md shadow-sm"
                            v-model="form.gender"
                            required
                        >
                            <option value="" disabled>
                                Seleccione una opción
                            </option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.gender"
                        />
                    </div>
                </div>

                <div class="mb-6 flex items-center justify-end">

                    <span class="text-sm text-gray-700">
                        ¿Ya tiene cuenta?
                        <Link
                            :href="route('login')"
                            class="text-[#1cbeec] font-semibold hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB]"
                        >
                            Iniciar Sesión
                        </Link>
                    </span>
                </div>

                <div class="mt-5">
                    <button
                        type="submit"
                        class="w-full bg-[#1cbeec] hover:bg-[#14bcc4] text-white font-bold py-2 px-4 rounded-lg transition-colors"
                    >
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
