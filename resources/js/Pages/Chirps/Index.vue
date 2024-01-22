<script setup>
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import Chirp from "@/Components/Chirp.vue"; //import the Chirp.vue to display
    import InputError from "@/Components/InputError.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {
        useForm,
        Head
    } from "@inertiajs/vue3";

    defineProps(["chirps"]); //define chirps because we use this in controller

    const form = useForm({
        message: "",
    });
</script>

<template>

    <Head title="Chirps" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
            <form
                @submit.prevent="
                    form.post(route('chirps.store'), {
                        onSuccess: () => form.reset(),
                    })
                ">
                <textarea v-model="form.message" placeholder="What's on your mind?"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
            <div class="mt-6 divide-y rounded-lg bg-white shadow-sm">
                <Chirp v-for="chirp in chirps" :key="chirp.id" :chirp="chirp" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
