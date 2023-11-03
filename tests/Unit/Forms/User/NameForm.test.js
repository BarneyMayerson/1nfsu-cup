import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import NameForm from "@/Forms/User/Settings/NameForm.vue";

describe("NameForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(NameForm);
  });

  it("renders name input", () => {
    const nameInput = wrapper.find("#name");

    expect(nameInput.exists()).toBeTruthy();
  });
});
