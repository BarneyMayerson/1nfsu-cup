import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import PasswordInput from "@/Components/Shared/PasswordInput.vue";

describe("PasswordInput.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(PasswordInput, {
      props: {
        id: "password",
        label: "Password",
      },
    });
  });

  it("renders input field", () => {
    const input = wrapper.find("input");

    expect(input.exists()).toBeTruthy();
  });

  it("default input type is password", () => {
    const input = wrapper.find("input");

    expect(input.attributes("type")).toBe("password");
  });

  it("may toggle input type to text and vice versa", async () => {
    const input = wrapper.find("input");
    const toggleButton = wrapper.find("button");

    await toggleButton.trigger("click");

    expect(input.attributes("type")).toBe("text");

    await toggleButton.trigger("click");

    expect(input.attributes("type")).toBe("password");
  });

  it("renders error using red color", () => {
    wrapper = mount(PasswordInput, {
      props: {
        id: "password",
        label: "Password",
        error: "It has an error",
      },
    });

    const errorEl = wrapper.find("#error");

    expect(errorEl.text()).toBe("It has an error");
    expect(errorEl.classes()).contains("text-red-600", "dark:text-red-400");
  });
});
