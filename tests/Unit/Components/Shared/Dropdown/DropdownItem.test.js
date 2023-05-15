import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import DropdownItem from "@/Components/Shared/Dropdown/DropdownItem.vue";

describe("DropdownItem.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(DropdownItem, {
      props: {
        href: "/",
      },
      shallow: true,
    });
  });

  it("has props default values", () => {
    expect(wrapper.vm.method).toBe("get");
    expect(wrapper.vm.is).toBe("a");
    expect(wrapper.vm.as).toBe("a");
  });
});
