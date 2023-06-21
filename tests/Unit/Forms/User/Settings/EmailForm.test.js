import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import EmailForm from "@/Forms/User/Settings/EmailForm.vue";

describe("EmailForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(EmailForm);
  });

  it("renders email input", () => {
    const emailInput = wrapper.find("#email");

    expect(emailInput.exists()).toBeTruthy();
  });
});
