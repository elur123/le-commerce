import { defineComponent } from 'vue'

// Boxicons
export const GithubIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12.026 2C6.517 2 2.052 6.465 2.052 11.974C2.052 16.38 4.909 20.119 8.873 21.439C9.372 21.529 9.552 21.222 9.552 20.958C9.552 20.721 9.544 20.093 9.541 19.262C6.766 19.864 6.18 17.924 6.18 17.924C5.728 16.772 5.073 16.465 5.073 16.465C4.168 15.846 5.142 15.86 5.142 15.86C6.144 15.93 6.669 16.888 6.669 16.888C7.559 18.412 9.005 17.972 9.571 17.717C9.662 17.072 9.922 16.632 10.206 16.383C7.992 16.132 5.664 15.276 5.664 11.453C5.664 10.366 6.053 9.474 6.688 8.778C6.587 8.525 6.242 7.51 6.787 6.138C6.787 6.138 7.624 5.869 9.529 7.159C10.3426 6.93767 11.1818 6.8247 12.025 6.823C12.8682 6.82437 13.7075 6.93735 14.521 7.159C16.427 5.868 17.263 6.138 17.263 6.138C17.808 7.51 17.466 8.525 17.362 8.778C18.002 9.474 18.386 10.365 18.386 11.453C18.386 15.286 16.056 16.128 13.834 16.375C14.189 16.683 14.509 17.291 14.509 18.221C14.509 19.555 14.497 20.631 14.497 20.958C14.497 21.225 14.675 21.535 15.184 21.437C19.146 20.115 22 16.379 22 11.974C22 6.465 17.535 2 12.026 2Z"
                />
            </svg>
        )
    },
})

export const TwitterIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path d="M19.633 7.99704C19.646 8.17204 19.646 8.34604 19.646 8.52004C19.646 13.845 15.593 19.981 8.186 19.981C5.904 19.981 3.784 19.32 2 18.172C2.324 18.209 2.636 18.222 2.973 18.222C4.78599 18.2264 6.54765 17.6202 7.974 16.501C7.13342 16.4858 6.31858 16.2085 5.64324 15.7078C4.9679 15.2071 4.46578 14.5079 4.207 13.708C4.456 13.745 4.706 13.77 4.968 13.77C5.329 13.77 5.692 13.72 6.029 13.633C5.11676 13.4489 4.29647 12.9544 3.70762 12.2337C3.11876 11.5131 2.79769 10.6107 2.799 9.68004V9.63004C3.336 9.92904 3.959 10.116 4.619 10.141C4.06609 9.77363 3.61272 9.27507 3.29934 8.68983C2.98596 8.1046 2.82231 7.4509 2.823 6.78704C2.823 6.03904 3.022 5.35304 3.371 4.75504C4.38314 6.00006 5.6455 7.01861 7.07634 7.7447C8.50717 8.4708 10.0746 8.88826 11.677 8.97004C11.615 8.67004 11.577 8.35904 11.577 8.04704C11.5767 7.518 11.6807 6.9941 11.8831 6.50528C12.0854 6.01647 12.3821 5.57232 12.7562 5.19823C13.1303 4.82414 13.5744 4.52745 14.0632 4.32512C14.5521 4.12279 15.076 4.01878 15.605 4.01904C16.765 4.01904 17.812 4.50504 18.548 5.29104C19.4498 5.11666 20.3145 4.78747 21.104 4.31804C20.8034 5.24886 20.1738 6.03815 19.333 6.53804C20.1328 6.44682 20.9144 6.2365 21.652 5.91404C21.1011 6.71714 20.4185 7.42139 19.633 7.99704V7.99704Z" />
            </svg>
        )
    },
})