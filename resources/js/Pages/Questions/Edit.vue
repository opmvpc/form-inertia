<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    question: Object
})

const form = useForm({
    _method: 'PUT',
    label: props.question.label,
    type: props.question.type,
});

const sendForm = () => {
    form.put(route('questions.update', props.question), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
    });
}

</script>

<template>
    <AppLayout title="Questions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier une question
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <FormSection @submitted="sendForm">
            <template #title>
                Modification d'une question
            </template>

            <template #description>
                Les questions seront reprises sur le formulaire pour les étudiants
            </template>

            <template #form>

                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="label" value="Label" />
                    <TextInput
                        id="label"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.label"
                    />
                    <InputError :message="form.errors.label" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="type" value="Label" />
                    <select
                        id="type"
                        class="mt-1 block w-full"
                        v-model="form.type"
                    >
                        <option value="choix">Choix multiple</option>
                        <option value="libre">Champs libre</option>
                    </select>
                    <InputError :message="form.errors.type" class="mt-2" />
                </div>
            </template>

            <template #actions>
                <ActionMessage :on="form.recentlySuccessful" class="me-3">
                    Saved.
                </ActionMessage>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </PrimaryButton>
            </template>
        </FormSection>
        </div>
    </AppLayout>
</template>
