<template>
    <section class="p-4">
        <h1 class="font-bold text-2xl mb-4">Search by Inertia</h1>

        <form class="mb-12 bg-gray-100 p-4 shadow-md rounded-lg" @submit.prevent="submit">
            <div class="grid grid-cols-4 grid-rows-2 gap-4 mb-6">
                <div class="col-span-2">
                    <label for="name" class="block">Name</label>
                    <input id="name"
                           name="name"
                           type="text"
                           v-model="form.name"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
                <div>
                    <label for="price_from" class="block">Price from</label>
                    <input id="price_from"
                           name="prprice_fromice"
                           type="number"
                           v-model="form.price_from"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
                <div>
                    <label for="price_to" class="block">Price to</label>
                    <input id="price_to"
                           name="price_to"
                           type="number"
                           v-model="form.price_to"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
                <div>
                    <label for="bedrooms" class="block">Bedrooms</label>
                    <input id="bedrooms"
                           name="bedrooms"
                           type="number"
                           v-model="form.bedrooms"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
                <div>
                    <label for="bathrooms" class="block">Bathrooms</label>
                    <input id="bathrooms"
                           name="bathrooms"
                           type="number"
                           v-model="form.bathrooms"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
                <div>
                    <label for="storeys" class="block">Storeys</label>
                    <input id="storeys"
                           name="storeys"
                           type="number"
                           v-model="form.storeys"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
                <div>
                    <label for="garages" class="block">Garages</label>
                    <input id="garages"
                           name="garages"
                           type="number"
                           v-model="form.garages"
                           class="w-full rounded-md border-gray-300 px-3 py-2 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"/>
                </div>
            </div>

            <div class="rounded-md shadow sm:mt-0 sm:flex-shrink-0 flex space-x-4">
                <button type="submit"
                        :disabled="loading"
                        :class="{'opacity-25': loading, 'cursor-not-allowed': loading}"
                        class="w-5/6 rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Search
                </button>

                <button type="button"
                        @click="reset"
                        class="w-1/6 rounded-md border border-transparent bg-gray-400 px-3 py-2 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Reset
                </button>
            </div>
        </form>

        <div v-if="!loading">
            <table v-if="properties.data.length"
                   class="min-w-full divide-y divide-gray-300"
            >
                <thead class="bg-gray-50">
                    <tr>
                        <th v-for="header in headers"
                            scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ header }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr v-for="property in properties.data"
                        :key="property.id">
                        <td v-for="column in property"
                            class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                        >{{ column }}</td>
                    </tr>
                </tbody>
            </table>

            <h2 v-else class="text-2xl text-center">No results found</h2>
        </div>
        <div v-else class="text-xl text-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="84px" height="84px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <rect x="19" y="19" width="20" height="20" fill="#85a2b6">
                    <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
                </rect><rect x="40" y="19" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.125s" calcMode="discrete"></animate>
            </rect><rect x="61" y="19" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.25s" calcMode="discrete"></animate>
            </rect><rect x="19" y="40" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.875s" calcMode="discrete"></animate>
            </rect><rect x="61" y="40" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.375s" calcMode="discrete"></animate>
            </rect><rect x="19" y="61" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.75s" calcMode="discrete"></animate>
            </rect><rect x="40" y="61" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.625s" calcMode="discrete"></animate>
            </rect><rect x="61" y="61" width="20" height="20" fill="#85a2b6">
                <animate attributeName="fill" values="#bbcedd;#85a2b6;#85a2b6" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.5s" calcMode="discrete"></animate>
            </rect>
                <!-- [ldio] generated by https://loading.io/ -->
            </svg>
        </div>


    </section>

</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
import {computed, ref} from "vue";

const loading = ref(false);

const props = defineProps({
    properties: {
        type: Object,
        default: {}
    }
})


const headers = computed(() => Object.keys(props.properties.data[0] ?? []))

const queryParams = new URLSearchParams(location.search);

const form = useForm({
    name: queryParams.get('name'),
    price_from: queryParams.get('price_from'),
    price_to: queryParams.get('price_to'),
    bedrooms: queryParams.get('bedrooms'),
    bathrooms: queryParams.get('bathrooms'),
    storeys: queryParams.get('storeys'),
    garages: queryParams.get('garages'),
});

function submit() {
    loading.value = true
    form.submit('get', '')
}

function reset() {
    form.name = null;
    form.price_from = null;
    form.price_to = null;
    form.bedrooms = null;
    form.bathrooms = null;
    form.storeys = null;
    form.garages = null;
    form.submit('get', '')
}
</script>
