import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import Dashboard from "@/Pages/User/Cabinet/Dashboard.vue";

describe("Cabinet/Dashboar.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(Dashboard, {
      shallow: true,
    });
  });

  it("it exists", () => {
    expect(Boolean(wrapper)).toBeTruthy();
  });
});
