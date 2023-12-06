import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import Create from "@/Pages/User/Cabinet/Tourneys/Create.vue";

describe("Cabinet/Tourneys/Create.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(Create, {
      shallow: true,
    });
  });

  it("it exists", () => {
    expect(Boolean(wrapper)).toBeTruthy();
  });
});
