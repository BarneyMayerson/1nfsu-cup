import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import PasswordResetForm from "@/Forms/Auth/PasswordResetForm.vue";

describe("ResetPasswordForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(PasswordResetForm);
  });

  it("has email input", () => {
    expect(wrapper.find("#email").exists()).toBe(true);
  });

  it("has password input", () => {
    expect(wrapper.find("#password").exists()).toBe(true);
  });

  it("has password confirmation input", () => {
    expect(wrapper.find("#password-confirmation").exists()).toBe(true);
  });
});
