<script setup>
import { ref, computed, reactive } from "vue";
import UserLayouts from "@/Pages/User/Layouts/UserLayouts.vue";
import { Head, router } from "@inertiajs/vue3";
import { notifyError, notify } from "@/Components/Notification";
import { Toaster } from "vue-sonner";
import Modal from "@/Components/Modal.vue";

const props = defineProps({
    sections: Array,
    programs: Object,
});

const showModal = ref(true);
const currentSectionIndex = ref(0);
const program = ref("");

const currentSection = computed(
    () => props.sections[currentSectionIndex.value]
);

const currentQuestions = computed(() => currentSection.value.asks || []);

const currentSectionName = computed(
    () =>
        currentSection.value.description || `Sección ${currentSectionIndex.value + 1}`
);

const ratings = [1, 2, 3, 4, 5, 6, 7];

const evaluations = reactive({});

props.sections.forEach((section) => {
    section.asks.forEach((question) => {
        evaluations[question.id] = {
            question: question.id,
            rating: "",
        };
    });
});

const submitEvaluation = async () => {
    const unansweredQuestions = Object.keys(evaluations).filter(
        (key) => !evaluations[key].rating
    );

    if (unansweredQuestions.length > 0) {
        notifyError(
            "Debe responder todas las preguntas antes de enviar la evaluación."
        );
        return;
    }
    const results = Object.keys(evaluations).map((key) => ({
        question: evaluations[key].question,
        value: evaluations[key].rating || "",
    }));

    await axios
        .post(route("evaluations.quiz.store", { program_id: program.value }), {
            answers: results,
        })
        .then((res) => {
            notify("¡Examen enviado con éxito!");
            setTimeout(() => {
                router.visit(route("evaluations.index"));
            }, 2000);
        })
        .catch((e) => {
            notifyError("error");
        });
};

const previousSection = () => {
    if (currentSectionIndex.value > 0) {
        currentSectionIndex.value--;
    }
};

const nextSection = () => {
    if (currentSectionIndex.value < props.sections.length - 1) {
        currentSectionIndex.value++;
    }
};
</script>

<template>
    <Head title="Evaluaciones" />
    <Toaster richColors />
    <Modal :show="showModal" :maxWidth="'2xl'" @close="showModal = false">
        <div
        class="p-8 bg-gradient-to-r from-green-500 via-teal-400 to-blue-500 rounded-xl shadow-lg text-white"
        >
            <h2 class="text-3xl font-semibold text-center mb-6">
                Autoevaluación Docentes Universitarios Cursos Prácticos
            </h2>

            <p class="text-lg text-center mb-6">
                Este evaluazión mide según cuatro dimensiones
                principales, asignando un puntaje máximo total de 280 puntos.
                Cada pregunta se califica en una escala de 1 a 7, donde:
            </p>

            <ul class="mt-4 space-y-2 list-inside">
                <li>
                    <strong class="text-lg">1:</strong> Totalmente en desacuerdo
                </li>
                <li><strong class="text-lg">2:</strong> En desacuerdo</li>
                <li>
                    <strong class="text-lg">3:</strong> Ligeramente en
                    desacuerdo
                </li>
                <li><strong class="text-lg">4:</strong> Neutral</li>
                <li>
                    <strong class="text-lg">5:</strong> Ligeramente de acuerdo
                </li>
                <li><strong class="text-lg">6:</strong> De acuerdo</li>
                <li>
                    <strong class="text-lg">7:</strong> Totalmente de acuerdo
                </li>
            </ul>

            <!-- <p class="mt-6 text-lg text-center">
                El puntaje final se pondera según el peso de cada dimensión.
            </p> -->

            <div class="mt-8 flex justify-center">
                <button
                    class="px-6 py-3 bg-white text-[#205072] font-semibold text-lg rounded-lg shadow-md hover:bg-[#CFF4D2] transition-all"
                    @click="showModal = false"
                >
                    Cerrar
                </button>
            </div>
        </div>
    </Modal>
    <UserLayouts>
        <div class="border border-gray-200 rounded-lg mt-10 px-4 py-6">
            <!-- Preguntas de evaluación -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">
                    Dimensión - {{ currentSectionName }}
                </h2>
                <p class="text-gray-600 mb-6">
                    Por favor, califique cada pregunta en una escala del 1 al 7.
                </p>
                <div
                    v-for="(question, index) in currentQuestions"
                    :key="question.id"
                    class="mb-4"
                >
                    <!-- Contenedor flex para el label y select -->
                    <div class="flex justify-between items-center">
                        <label
                            :for="'question-' + question.id"
                            class="text-gray-700 font-medium"
                        >
                            {{ index + 1 }}. {{ question.description }}
                        </label>
                        <select
                            :id="'question-' + question.id"
                            v-model="evaluations[question.id].rating"
                            class="ml-4 px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        >
                            <option disabled value="">
                                --
                            </option>
                            <option
                                v-for="rating in ratings"
                                :key="rating"
                                :value="rating"
                            >
                                {{ rating }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Paginador -->
            <div class="flex flex-wrap justify-center gap-2 mt-6 p-5 mb-10">
                <!-- Se agregó mb-10 -->
                <button
                    @click="previousSection"
                    :disabled="currentSectionIndex === 0"
                    class="px-4 py-2 rounded-lg font-medium text-white w-full md:w-auto"
                    :class="{
                        'opacity-50 cursor-not-allowed bg-gray-400 hover:bg-gray-400':
                            currentSectionIndex === 0,
                        'bg-blue-600 hover:bg-blue-500':
                            currentSectionIndex !== 0,
                    }"
                >
                    Anterior
                </button>
                <button
                    @click="nextSection"
                    :disabled="
                        currentSectionIndex === props.sections.length - 1
                    "
                    class="px-4 py-2 rounded-lg font-medium text-white w-full md:w-auto"
                    :class="{
                        'opacity-50 cursor-not-allowed bg-gray-400 hover:bg-gray-400':
                            currentSectionIndex === props.sections.length - 1,
                        'bg-indigo-600 hover:bg-indigo-500':
                            currentSectionIndex !== props.sections.length - 1,
                    }"
                >
                    Siguiente
                </button>
            </div>

            <!-- Botón de enviar evaluación -->
            <div
                v-if="currentSection.id == 4"
                class="flex justify-end pb-10 px-5 mt-2 mb-10"
            >
                <!-- Se agregó mb-10 -->
                <button
                    @click="submitEvaluation"
                    class="w-full md:w-64 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm"
                >
                    Enviar evaluación
                </button>
            </div>
        </div>
    </UserLayouts>
</template>
