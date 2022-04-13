<template>
  <Head :title="title" />
  <header class="bg-white md:shadow">
    <nav class="flex items-center justify-between px-4 md:px-12 py-4 ">
      <div class="flex gap-4">
        <MenuAlt2Icon class="w-6 md:hidden text-emerald-900" @click="menuOpen()"/>
        <Link :href="route('welcome')">
          <h1 class="text-2xl font-bold text-emerald-600 ">Arcox | Prime</h1>
        </Link>
      </div>
      <ul
        class="absolute top-12 left-0 flex-col bg-white w-full md:static md:w-auto md:flex md:flex-row md:gap-4 text-base shadow-2xl md:shadow-transparent"
        :class="[open ? 'flex' : 'hidden']">
        <li class="px-4 py-2 hover:bg-slate-100 hover:shadow md:hover:bg-white md:hover:shadow-transparent" v-for="(category, index) in categories" :key="index">
          <Link :href="route('shop.index', {category: category.slug})" class="text-emerald-900 hover:text-emerald-700" > 
            {{ category.name }} 
          </Link>
        </li>
      </ul>
      <div class="flex gap-4">
        <UserIcon class="w-6 " />
        <HeartIcon class="w-6 " />
        <ShoppingCartIcon class="w-6 " />
      </div>
    </nav>
  </header>
  <main>
      <slot />
  </main>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'
import { UserIcon, HeartIcon, ShoppingCartIcon, MenuAlt2Icon } from '@heroicons/vue/outline'

export default {
  props: {
    categories: Array,
    title: String  
  },
  components: {
    Head,
    Link,
    UserIcon,
    HeartIcon,
    ShoppingCartIcon,
    MenuAlt2Icon,
  },
  setup() {
    let open = ref(false)

    function menuOpen() {
      open.value = !open.value
    }

    return {
      open,
      menuOpen,
    }
  },
}
</script>
