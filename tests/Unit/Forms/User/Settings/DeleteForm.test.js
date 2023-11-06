import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import DeleteForm from "@/Forms/User/Settings/DeleteForm.vue";

describe("DeleteForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(DeleteForm);
  });

  it("renders email input", () => {
    const emailInput = wrapper.find("#email");

    expect(emailInput.exists()).toBeTruthy();
  });

  it("renders phrase input", () => {
    const phraseInput = wrapper.find("#phrase");

    expect(phraseInput.exists()).toBeTruthy();
  });
});
