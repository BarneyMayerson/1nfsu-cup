import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import LoginForm from "@/Forms/User/Settings/ProfileForm.vue";

describe("LoginForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(LoginForm);
  });

  it("renders name input", () => {
    const nameInput = wrapper.find("#name");

    expect(nameInput.exists()).toBeTruthy();
  });
});
