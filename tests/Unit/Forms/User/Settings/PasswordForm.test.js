import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import PasswordForm from "@/Forms/User/Settings/PasswordForm.vue";

describe("PasswordForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(PasswordForm);
  });

  it("renders password input", () => {
    const passwordInput = wrapper.find("#password");

    expect(passwordInput.exists()).toBeTruthy();
  });

  it("renders password confirmation input", () => {
    const passwordConfirmInput = wrapper.find("#password-confirmation");

    expect(passwordConfirmInput.exists()).toBeTruthy();
  });
});
