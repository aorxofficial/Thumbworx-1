<template>
	<aside :class="`${is_expanded ? 'is-expanded' : ''}`">
		<div class="logo">

		</div>

		<div class="menu-toggle-wrap">
			<button class="menu-toggle" @click="toggleMenu">
				<span class="material-icons">keyboard_double_arrow_right</span>
			</button>
		</div>

		<h3>Menu</h3>
		<div class="menu">
			<router-link to="/Dashboard" class="button">
				<span class="material-icons">dashboard</span>
				<span class="text">Dashboard</span>
			</router-link>
			<router-link to="/UserAccount" class="button">
				<!-- material-icons = icon-->
				<span class="material-icons">group</span> 
				<span class="text">Account</span>
			</router-link>
			<router-link to="/Logs" class="button">
				<span class="material-icons">description</span>
				<span class="text">Logs</span>
			</router-link>
			<router-link to="/AccountRecover" class="button">
				<span class="material-icons">group</span>
				<span class="text">Account Recovery</span>
			</router-link>
			
		</div>

		<div class="flex"></div>
			
		<div class="menu">
			<button @click="logout" class="button">
				<span class="material-icons">logout</span>
				<span class="text">Logout</span>
			</button>
		</div>
	</aside>
</template>

<script>
import { ref } from 'vue'
import router from '../router' // Para maredirect sa login or other pages kung want
import { useAdminStore } from '../stores/adminStore'

export default {
	name: 'Sidebar',
	data() {
		return {
			is_expanded: true,
		}
	},
	setup() {
		const adminStore = useAdminStore();
		return { adminStore }
	},
	methods: {
		toggleMenu() {
			this.is_expanded = !this.is_expanded;
		},
		logout() {
			this.adminStore.logout()
		}
	}
}
</script>


<style lang="scss" scoped>
aside {
	display: flex;
	flex-direction: column;

	background-color: var(--dark);
	color: var(--light);

	width: calc(2rem + 32px);
	overflow: hidden;
	min-height: 100vh;
	padding: 1rem;

	transition: 0.2s ease-in-out;

	.flex {
		flex: 1 1 0%;
	}

	.logo {
		margin-bottom: 1rem;

		img {
			width: 2rem;
		}
	}

	.menu-toggle-wrap {
		display: flex;
		justify-content: flex-end;
		margin-bottom: 1rem;

		position: relative;
		top: 0;
		transition: 0.2s ease-in-out;

		.menu-toggle {
			transition: 0.2s ease-in-out;
			.material-icons {
				font-size: 2rem;
				color: var(--light);
				transition: 0.2s ease-out;
			}
			
			&:hover {
				.material-icons {
					color: var(--primary);
					transform: translateX(0.5rem);
				}
			}
		}
	}

	h3, .button .text {
		opacity: 0;
		transition: opacity 0.3s ease-in-out;
	}

	h3 {
		color: var(--grey);
		font-size: 0.875rem;
		margin-bottom: 0.5rem;
		text-transform: uppercase;
	}

	.menu {
		margin: 0 -1rem;

		.button {
			display: flex;
			align-items: center;
			text-decoration: none;

			transition: 0.2s ease-in-out;
			padding: 0.5rem 1rem;

			.material-icons {
				font-size: 2rem;
				color: var(--light);
				transition: 0.2s ease-in-out;
			}
			.text {
				color: var(--light);
				transition: 0.2s ease-in-out;
			}

			&:hover {
				background-color: var(--dark-alt);

				.material-icons, .text {
					color: var(--primary);
				}
			}

			&.router-link-exact-active {
				background-color: var(--dark-alt);
				border-right: 5px solid var(--primary);

				.material-icons, .text {
					color: var(--primary);
				}
			}
		}
	}

	.footer {
		opacity: 0;
		transition: opacity 0.3s ease-in-out;

		p {
			font-size: 0.875rem;
			color: var(--grey);
		}
	}

	&.is-expanded {
		width: var(--sidebar-width);

		.menu-toggle-wrap {
			top: -3rem;
			
			.menu-toggle {
				transform: rotate(-180deg);
			}
		}

		h3, .button .text {
			opacity: 1;
		}

		.button {
			.material-icons {
				margin-right: 1rem;
			}
		}

		.footer {
			opacity: 0;
		}
	}

	@media (max-width: 1024px) {
		position: absolute;
		z-index: 99;
	}
}
</style>