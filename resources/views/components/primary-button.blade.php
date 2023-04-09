<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center inline-flex focus:outline-none text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-md px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800']) }}>
    {{ $slot }}
</button>
