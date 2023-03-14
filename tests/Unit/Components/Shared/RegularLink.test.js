import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import RegularLink from "@/Components/Shared/RegularLink.vue";

describe("RegularLink.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(RegularLink, {
      slots: {
        default: "Test Link",
      },
      props: {
        href: "/",
      },
    });
  });

  it("renders link text", () => {
    expect(wrapper.html()).toContain("Test Link");
  });

  it("has default html tag", () => {
    expect(wrapper.props("as")).toBe("a");
  });

  it("has default method", () => {
    expect(wrapper.props("method")).toBe("get");
  });

  it("has the Inertia Link with valid href", () => {
    const link = wrapper.findComponent("[data-test='regular-link']");

    expect(link.props("href")).toBe("/");
  });
});
