<script setup>
import AuthLayout from '../layouts/AuthLayout.vue'
</script>


<template>
<AuthLayout name="Sign in to your account">
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-500">Email address</label>
          <div class="mt-2">
            <input type="email" name="email" id="email" autocomplete="email" required="" class="block w-full rounded-md  px-3 py-1.5 text-base outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-500">Password</label>
          </div>
          <div class="mt-2">
            <input type="password" name="password" id="password" autocomplete="current-password" required="" class="block w-full rounded-md px-3 py-1.5 text-base outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold hover:bg-indigo-400 text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign in</button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm/6 text-gray-400">
        Not a member?
        {{ ' ' }}
        <RouterLink :to="{name:'signup'}" class="font-semibold text-indigo-400 hover:text-indigo-300">Sign up</RouterLink>
      </p>
</AuthLayout>
</template>
