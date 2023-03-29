import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import Avatar from "@/Components/User/Avatar.vue";

describe("Avatar. vue", () => {
  it("defines whether has an avatar", () => {
    let wrapper = mount(Avatar);

    expect(wrapper.vm.hasImage).toBe(false);

    wrapper = mount(Avatar, {
      props: {
        imageUrl: "fake-url",
      },
    });

    expect(wrapper.vm.hasImage).toBe(true);
  });
});
