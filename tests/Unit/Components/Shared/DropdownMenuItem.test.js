import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import DropdownMenuItem from "@/Components/Shared/Dropdown/DropdownMenuItem.vue";

describe("DropdownMenuItem.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(DropdownMenuItem, {
      props: {
        href: "/",
      },
    });
  });

  it("has props default values", () => {
    expect(wrapper.vm.method).toBe("get");
    expect(wrapper.vm.isCurrent).toBe(false);
    expect(wrapper.vm.active).toBe(false);
    expect(wrapper.vm.as).toBe("a");
  });
});
