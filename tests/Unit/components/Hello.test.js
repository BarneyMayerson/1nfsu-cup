import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import Hello from "@/Components/Hello.vue";

describe("Hello.vue", () => {
  it("rendes a name", () => {
    const wrapper = mount(Hello, {
      props: {
        name: "Joe Doe",
      },
    });

    expect(wrapper.text()).toBe("Hello, Joe Doe");
  });
});
