<div class="container py-8 font-sans">
    <div
        x-data="{ ...underlinedTabs() }"
    >
        <ul
            role="tablist"
            class="z-10 flex items-end -mb-px border-b border-gray-300"
        >
            @foreach($tabs as $tab)
                <li role="presentation" class="inline-flex">
                    <button
                        id="tab-{{ $loop->index }}"
                        class="px-6 py-3 font-bold border-transparent border-b-3 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-blue-500"
                        role="tab"

                        x-ref="tab-{{ $loop->index }}"
                        x-bind:tabindex="tabIndex({{ $loop->index }})"
                        x-bind:class="tabClasses({{ $loop->index }})"

                        x-bind:aria-selected="isActiveTab({{ $loop->index }})"

                        x-on:click.prevent="setActiveTab({{ $loop->index }})"
                        x-on:keydown.arrow-left="setActiveTab({{ $loop->index - 1 }})"
                        x-on:keydown.arrow-right="setActiveTab({{ $loop->index + 1 }})"
                    >
                        {{ $tab }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div>
            {{ $slot }}
        </div>

    </div>
</div>

<script>
    const underlinedTabs = () => {
        return {
            active: 0,

            tabsCount: {{ count($tabs) }},

            setActiveTab(index) {
                if (index < 0 || index > this.tabsCount - 1) {
                    return
                }

                this.active = index;

                this.$refs['tab-' + index].focus();
            },

            isActiveTab(index) {
                return this.active === index
            },

            tabClasses(index) {
                return {
                    'border-red-600 text-gray-800': this.isActiveTab(index),
                    'text-gray-600': !this.isActiveTab(index)
                }
            },

            tabIndex(index) {
                return this.isActiveTab(index) ? '' : '-1'
            }
        }
    }
</script>
