import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import Index from "@/Pages/User/Cabinet/Tourneys/Index.vue";

describe("Cabinet/Tourneys/Index.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(Index, {
      shallow: true,
    });
  });

  it("it exists", () => {
    expect(Boolean(wrapper)).toBeTruthy();
  });
});
