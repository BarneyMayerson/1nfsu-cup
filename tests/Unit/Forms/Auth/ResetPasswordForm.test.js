import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import ResetPasswordForm from "@/Forms/Auth/ResetPasswordForm.vue";

describe("ResetPasswordForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(ResetPasswordForm);
  });

  it("has email input", () => {
    expect(wrapper.find("#email").exists()).toBe(true);
  });

  it("has password input", () => {
    expect(wrapper.find("#password").exists()).toBe(true);
  });

  it("has password confirmation input", () => {
    expect(wrapper.find("#password_confirmation").exists()).toBe(true);
  });
});
