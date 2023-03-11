import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import RegisterForm from "@/Forms/Auth/RegisterForm.vue";

describe("RegisterForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(RegisterForm);
  });

  it("renders name input", () => {
    const nameInput = wrapper.find("#name");

    expect(nameInput.exists()).toBeTruthy();
  });

  it("renders email input", () => {
    const emailInput = wrapper.find("#email");

    expect(emailInput.exists()).toBeTruthy();
  });

  it("renders password input", () => {
    const passwordInput = wrapper.find("#password");

    expect(passwordInput.exists()).toBeTruthy();
  });

  it("renders password confirmation input", () => {
    const passwordConfirmationInput = wrapper.find("#password-confirmation");

    expect(passwordConfirmationInput.exists()).toBeTruthy();
  });
});
