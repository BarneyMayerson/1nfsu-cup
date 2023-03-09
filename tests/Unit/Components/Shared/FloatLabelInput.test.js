import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import FloatLabelInput from "@/Components/Shared/FloatLabelInput.vue";

describe("FloatLabelInput.vue", () => {
  let wrapper = null;

  beforeEach(() => {
    wrapper = mount(FloatLabelInput, {
      props: {
        id: "foo",
        label: "Test Label",
        hint: "Hint goes here",
      },
    });
  });

  it("renders input field", () => {
    const input = wrapper.find("input");

    expect(input.exists()).toBeTruthy();
  });

  it("renders hint", () => {
    const hintEl = wrapper.find("#hint");

    expect(hintEl.text()).toBe("Hint goes here");
  });

  it("renders error using red color instead of hint", () => {
    wrapper = mount(FloatLabelInput, {
      props: {
        id: "foo",
        label: "Test Label",
        error: "It has an error",
      },
    });

    const errorEl = wrapper.find("#error");

    expect(errorEl.text()).toBe("It has an error");
    expect(errorEl.classes()).contains("text-red-600", "dark:text-red-400");

    const hintEl = wrapper.find("#hint");

    expect(hintEl.exists()).toBeFalsy();
  });
});
