import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import LoginForm from "@/Forms/Auth/LoginForm.vue";

describe("LoginForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(LoginForm);
  });

  it("renders email input", () => {
    const emailInput = wrapper.find("#email");

    expect(emailInput.exists()).toBeTruthy();
  });

  it("renders password input", () => {
    const passwordInput = wrapper.find("#password");

    expect(passwordInput.exists()).toBeTruthy();
  });
});
