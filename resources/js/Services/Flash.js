import { useToast, POSITION } from "vue-toastification";
import { usePage } from "@inertiajs/vue3";

const toast = useToast();

export function showFlash(options) {
  toast(options.message, {
    position: options.position ?? POSITION.BOTTOM_RIGHT,
    timeout: options.timeout ?? 5000,
    type: options.type,
    closeOnClick: false,
  });
}

export function flash() {
  const options = usePage().props.flash;

  showFlash(options);
}
