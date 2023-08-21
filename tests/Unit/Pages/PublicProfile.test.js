import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import PublicProfile from "@/Pages/PublicProfile.vue";

describe("PublicProfile", () => {
  it("displays the user profile info", () => {
    const user = {
      name: "Joe Silver",
      avatar: "path-to-profile-avatar",
      country: "BE",
    };

    console.log(user);
    const wrapper = mount(PublicProfile, {
      shallow: true,
      props: {
        user,
      },
    });

    expect(wrapper.text()).toContain(user.name);
    expect(wrapper.text()).toContain(user.avatar);
    expect(wrapper.text()).toContain(user.country);
  });
});
