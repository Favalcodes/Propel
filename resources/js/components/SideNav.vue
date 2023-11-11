<template>
    <aside>
        <div class="side-menu">
            <a class="nav-button" activeClass="active-nav" href="/dashboard">
                <span class="material-icons">
                    <Icons name="home" />
                </span>
                <span class="text">Home</span>
            </a>
            <a class="nav-button" activeClass="active-nav" href="/ecommerce">
                <span class="material-icons">
                    <Icons name="jobs" />
                </span>
                <span class="text">Jobs</span>
            </a>
            <a class="nav-button" activeClass="active-nav" href="/blog">
                <span class="material-icons">
                    <Icons name="financial" />
                </span>
                <span class="text">Financial Service</span>
            </a>
            <a class="nav-button" activeClass="active-nav" href="/lms">
                <span class="material-icons">
                    <Icons name="discount" />
                </span>
                <span class="text">Discount and Deals</span>
            </a>
            <a class="nav-button" activeClass="active-nav" href="/lms">
                <span class="material-icons">
                    <Icons name="opportunity" />
                </span>
                <span class="text">Opportunities</span>
            </a>
            <a class="nav-button" activeClass="active-nav" href="/lms">
                <span class="material-icons">
                    <Icons name="refer" />
                </span>
                <span class="text">Refer a Friend</span>
            </a>
            <a class="nav-button" activeClass="active-nav" href="/lms">
                <span class="material-icons">
                    <Icons name="community" />
                </span>
                <span class="text">Community Wall</span>
            </a>
        </div>


        <div class="flex"></div>
        <div class="side-menu">
            <a class="nav-button" activeClass="active-nav" href="/settings">
                <span class="material-icons">
                    <Icons name="propel" />
                </span>
                <span class="text">Powered by</span>
            </a>
        </div>
    </aside>
</template>

<script>
import { ref } from 'vue';
import Icons from './Icons.vue';

export default {
    components: { Icons },
    setup() {
        const isExpanded = ref(localStorage.getItem('isExpanded') === "true");

        const toggleMenu = () => {
            isExpanded.value = !isExpanded.value
            localStorage.setItem("isExpanded", isExpanded.value)
        }

        return {
            isExpanded,
            toggleMenu
        }
    }
};
</script>

<style lang="scss" scoped>

    aside {
        position: fixed;
        display: flex;
        flex-direction: column;
        background-color: #fff;
        color: #1d1d1d;
        width: calc(2rem + 16px);
        overflow: hidden;
        height: 100vh;
        padding: 1rem 0;
        transition: 0.2s ease-out;
        font-size: 14px;
        z-index: 999;
        border-right: 1px solid #c4c4c4;
        overflow-y: scroll;
        margin-top: var(--header-height);

        &::-webkit-scrollbar {
            display: none;
        }

        button {
            background: transparent;
        }

        .flex {
            flex: 1 1 0;
        }

        .links {
            display: flex;
            margin-left: 50%;
            justify-content: flex-end;
            position: relative;
            top: 0;
            transition: 0.2s ease-out;

            .menu-toggle {
                transition: 0.2s ease-out;
                box-shadow: none;

                &:focus {
                    box-shadow: none;
                    border: none;
                }

                .material-icons {
                    color: #344054;
                    transition: 0.2s ease-out;
                    margin-right: 15px;
                }

                &:hover {
                    .material-icons {
                        color: #1C7731;
                        transform: translateX(0.5rem);
                    }
                }
            }
        }

        h5,
        .nav-button .text {
            opacity: 0;
            transition: 0.3s ease-out;
        }

        h5 {
            color: #8B8B8B;
            font-size: 13px;
            font-weight: 400;
        }

        .side-menu {
            margin: 0;
            line-height: 20px;

            .nav-button {
                display: flex;
                align-items: center;
                text-decoration: none;
                transition: 0.2s ease-out;

                .material-icons {
                    color: #344054;
                    transition: 0.2s ease-out;
                }

                .text {
                    color: #344054;
                    transition: 0.2s ease-out;
                }

                &:hover,
                &.active-nav {
                    background-color: #EAF6EC;
                    border-left: 4px solid #24983F;

                    .material-icons,
                    .text {
                        color: #24983F;
                    }
                }
            }
        }

        &.is-expanded {
            width: var(--sidenav-width);

            .links {
                top: -2rem;

                .menu-toggle {
                    transform: rotate(-180deg);
                }
            }


            h5,
            .nav-button .text {
                opacity: 1;
            }

            .nav-button {
                .material-icons {
                    margin-right: 1rem;
                }
            }
        }

        @media (max-width: 768px) {
            position: fixed;
            z-index: 999;
        }
    }

    .d-c {
        flex: 1 1 auto;
        position: relative;
        transition: 0.3s ease;
        margin-left: calc(2rem + 16px);
        width: calc(100% - var(--sidenav-width));

        .dashboard-header {
            position: fixed;
            // transition: 0.3s ease;
            z-index: 999;
            width: calc(100% - calc(2rem + 16px));
        }

        &.is-expanded {
            margin-left: var(--sidenav-width);

            .dashboard-header {
                width: calc(100% - var(--sidenav-width));
            }
        }

        @media (max-width: 768px) {
            padding-left: 3rem;
        }
    }

</style>
