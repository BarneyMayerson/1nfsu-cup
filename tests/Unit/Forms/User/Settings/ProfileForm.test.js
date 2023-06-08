import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import ProfileForm from "@/Forms/User/Settings/ProfileForm.vue";

describe("ProfileForm.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(ProfileForm, {
      props: {
        user: {
          name: "",
        },
      },
    });
  });

  it("renders name input", () => {
    const nameInput = wrapper.find("#name");

    expect(nameInput.exists()).toBeTruthy();
  });

  it("renders country select input", () => {
    const countryInput = wrapper.find("#country");

    expect(countryInput.exists()).toBeTruthy();
  });
});
