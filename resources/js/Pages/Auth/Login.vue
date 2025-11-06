<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue'
import { ref } from 'vue'

const showPassword = ref(false)

defineProps({
    canResetPassword: Boolean,
    status: String,
});

function togglePasswordVisibility() {
    showPassword.value = !showPassword.value;
}

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};


// the route is in web.php
const loginWithGoogle = () => {
    window.location.href = '/auth/google';
}
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <!-- <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                /> -->

                <div class="password-input-wrapper relative">
                    <TextInput id="password" :type="showPassword ? 'text' : 'password'" v-model="form.password" required
                        autocomplete="current-password" class="form-input w-full rounded border-gray-300 pr-10"
                        placeholder="Enter your password" />
                    <button type="button" class="password-toggle-button absolute inset-y-0 right-3 flex items-center"
                        @click="togglePasswordVisibility"
                        :aria-label="showPassword ? 'Hide password' : 'Show password'">
                        <svg v-if="showPassword" class="password-icon eye-open-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242" />
                        </svg>
                        <svg v-else class="password-icon eye-closed-icon" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>


                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>

        </form>


        <div class="justify-center items-center align-center">
            <div class="my-3 text-center">
                <h2>OR</h2>
            </div>
            <button
                class="flex w-full items-center justify-center gap-3 px-6 py-3 mt-3 bg-white border border-gray-300 rounded-xl font-semibold text-gray-900 hover:bg-gray-50 transition-colors duration-200"
                @click="loginWithGoogle">
                <!-- <i class="fab fa-google text-xl"></i> -->
                <Icon icon="logos:google-icon" />
                Continue with Google
            </button>
        </div>
    </GuestLayout>
</template>


<style>
.password-toggle-button {
    position: absolute;
    right: 0.75rem;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 0.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.15s ease-in-out;
    color: #6b7280;
}

.password-icon {
    width: 1.25rem;
    height: 1.25rem;
    stroke-width: 2;
    transition: color 0.15s ease-in-out;
}

.eye-open-icon,
.eye-closed-icon {
    color: inherit;
}
</style>