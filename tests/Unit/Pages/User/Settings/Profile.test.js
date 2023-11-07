import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import Profile from "@/Pages/User/Settings/Profile.vue";
import ProfileForm from "@/Forms/User/Settings/ProfileForm.vue";
import AvatarForm from "@/Forms/User/Settings/AvatarForm.vue";

describe("Profile.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(Profile, {
      shallow: true,
    });
  });

  it("it exists", () => {
    expect(Boolean(wrapper)).toBeTruthy();
  });

  it("contains Profile Form", () => {
    const form = wrapper.findComponent(ProfileForm);

    expect(form.exists()).toBeTruthy();
  });

  it("contains Avatar Form", () => {
    const form = wrapper.findComponent(AvatarForm);

    expect(form.exists()).toBeTruthy();
  });
});
