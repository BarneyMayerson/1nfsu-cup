import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import ForgotPasswordForm from "@/Forms/Auth/ForgotPasswordForm.vue";

describe("ForgotPasswordForm.vue", () => {
  it("renders email input", () => {
    const wrapper = mount(ForgotPasswordForm);
    const emailInput = wrapper.find("input");

    expect(emailInput.exists()).toBeTruthy();
  });
});
