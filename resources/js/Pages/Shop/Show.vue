<template>
    <app-layout-customer :title="`Catálogo: ${product.name}`" :categories="categories">
        <h2 class="text-base text-white font-medium py-2 text-center w-full bg-emerald-900">
            Catálogo
        </h2>
        <breadcrumb-shop>
            <template #breadcrumb>
                <div>
                    <span class="text-rose-900">{{ product.name }}</span>
                </div>
            </template>
        </breadcrumb-shop>
        <div class="mx-12 border border-slate-100 flex">
            <div class="w-6/12 flex gap-4">
                <div class="flex flex-col gap-2">
                    <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                        class="-z-10 w-full object-center object-cover">
                    <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                        class="-z-10 w-full object-center object-cover">
                    <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                        class="-z-10 w-full object-center object-cover">
                    <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                        class="-z-10 w-full object-center object-cover">
                    <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                        class="-z-10 w-full object-center object-cover">
                </div>
                <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                    class="-z-10 w-full object-center object-cover">
            </div>
            <div class="w-6/12 p-4 relative flex flex-col gap-8">
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg text-emerald-900">{{ product.name }}</h2>
                    <p class="text-sm text-emerald-900">SKU: {{ product.product_code }}</p>
                </div>

                <p class="text-2xl text-emerald-900">{{ $filters.formatCurrency(product.price) }}</p>

                <div class="flex flex-col gap-2">
                    <p class="text-base">Quantidade: {{ product.quantity }}</p>
                    <form @submit.prevent="form.post(`/addcart/${product.id}`)" class="w-1/2">
                            <input type="number" v-model="form.quantity" class="hidden">
                            <button type="submit"
                                class="text-xs uppercase font-medium text-black bg-emerald-500 py-2 w-full rounded mt-2 hover:brightness-90">
                                ADICIONAR AO CARRINHO
                            </button>
                        </form>
                </div>
                <div class="w-6/12 rounded-lg p-4 bg-slate-100 shadow-md flex items-center justify-center">
                    <div class="w-full p-2 rounded-2xl">
                        <Disclosure v-slot="{ open }">
                            <DisclosureButton
                                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-emerald-900 bg-rose-100 rounded-lg hover:bg-rose-200 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500 focus-visible:ring-opacity-75">
                                <span>Descrição do Produto</span>
                                <ChevronDownIcon :class="open ? 'transform rotate-180' : ''"
                                    class="w-5 h-5 text-rose-500" />
                            </DisclosureButton>
                            <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
                                {{ product.description }}
                            </DisclosurePanel>
                        </Disclosure>
                        <Disclosure as="div" class="mt-2" v-slot="{ open }">
                            <DisclosureButton
                                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-emerald-900 bg-rose-100 rounded-lg hover:bg-rose-200 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500 focus-visible:ring-opacity-75">
                                <span>Detalhes do Produto</span>
                                <ChevronDownIcon :class="open ? 'transform rotate-180' : ''"
                                    class="w-5 h-5 text-rose-500" />
                            </DisclosureButton>
                            <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
                                {{ product.details }}
                            </DisclosurePanel>
                        </Disclosure>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-12 border border-slate-100 mt-8 p-4 rounded">
            <h3 class="text-lg text-emerald-900 mb-2">Você também pode levar:</h3>
            <hr />
            <div class="mt-4 w-full grid grid-cols-2 sm:grid-cols-4 lg:gap-4">
                <div class="col-span-1 border border-slate-300 hover:shadow-xl rounded"
                    v-for="product in products.slice(0, 4)" :key="product.id">
                    <div
                        class="w-full bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  lg:aspect-none">
                        <img :src="'/storage/img/product_image.png'" alt="{{ props.title }}"
                            class="-z-10 w-full object-center object-cover">
                    </div>
                    <div class="my-4 px-2 flex flex-col items-center justify-between">
                        <div class="">
                            <h3 class="text-sm text-center font-semibold ">
                                <Link :href="route('shop.show', product.slug)">
                                <span aria-hidden="true" class="inset-0 text-black">{{ product.name }}</span>
                                </Link>
                            </h3>
                            <p class="mt-1 text-sm text-slate-500 text-center">{{
                                $filters.formatCurrency(product.price)
                            }}
                            </p>
                        </div>
                        <form @submit.prevent="form.post(`/addcart/${product.id}`)" class="w-full">
                            <input type="number" v-model="form.quantity" class="hidden">
                            <button type="submit"
                                class="text-xs uppercase font-medium text-black bg-emerald-500 py-2 w-full rounded mt-2 hover:brightness-90">
                                ADICIONAR AO CARRINHO
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout-customer>
</template>

<script>
import AppLayoutCustomer from '@/Layouts/AppLayoutCustomer.vue'
import BreadcrumbShop from '@/Components/BreadcrumbShop.vue'
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/solid'
import { Link, useForm } from '@inertiajs/inertia-vue3'


export default {
    components: {
        AppLayoutCustomer,
        BreadcrumbShop,
        ChevronDownIcon,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Link
    },
    props: ['product', 'products', 'categories'],
    setup() {
        const form = useForm({
            quantity: 1,
        })

        return {
            form,
        }
    },

}
</script>

