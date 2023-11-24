import { describe, it, expect, beforeEach } from "vitest";
import { shallowMount } from "@vue/test-utils";
import PublicProfile from "@/Pages/PublicProfile.vue";
import Avatar from "@/Components/User/Avatar.vue";
import {
  countryListAlpha2Array,
  countryListAlpha2,
} from "@/Countries/countries-list";

describe("PublicProfile", () => {
  let wrapper = null;

  const user = {
    name: "Joe Silver",
    country: "BE",
  };

  beforeEach(() => {
    wrapper = shallowMount(PublicProfile, {
      props: {
        user,
      },
    });
  });

  it("displays a user avatar", () => {
    expect(wrapper.findComponent(Avatar).exists()).toBeTruthy();
  });

  it("displays the user name", () => {
    expect(wrapper.text()).toContain(user.name);
  });

  it("contains an img element with country code", () => {
    const img = wrapper.find("#flag");

    expect(img.attributes().src).toContain(user.country.toLowerCase());
  });

  it("contains a country name", () => {
    const countryName = countryListAlpha2Array.find(
      (country) => country.code === user.country
    ).name;

    expect(wrapper.text()).toContain(countryName);
  });
});
