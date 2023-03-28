import { useToast, POSITION } from "vue-toastification";

const toast = useToast();

export function showFlash(options) {
  toast(options.message, {
    position: options.position ?? POSITION.BOTTOM_RIGHT,
    timeout: options.timeout ?? 5000,
    type: options.type,
    closeOnClick: false,
  });
}
