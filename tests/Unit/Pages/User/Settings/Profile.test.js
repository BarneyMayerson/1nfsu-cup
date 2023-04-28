import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import Profile from "@/Pages/User/Settings/Profile.vue";

describe("Profile.vue", () => {
  it("it exists", () => {
    const wrapper = mount(Profile);

    expect(Boolean(wrapper)).toBeTruthy();
  });
});
