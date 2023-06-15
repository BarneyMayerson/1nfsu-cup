import "momentum-trail";

declare module "momentum-trail" {
    export interface RouterGlobal {
        url: "http://1nfsu-cup.lan";
        port: null;
        defaults: [];
        routes: {
            "sanctum.csrf-cookie": {
                uri: "sanctum/csrf-cookie";
                methods: ["GET", "HEAD"];
            };
            home: { uri: "/"; methods: ["GET", "HEAD"] };
            setAvatar: { uri: "/"; methods: ["POST"] };
            register: { uri: "register"; methods: ["GET", "HEAD"] };
            login: { uri: "login"; methods: ["GET", "HEAD"] };
            "password.request": {
                uri: "forgot-password";
                methods: ["GET", "HEAD"];
            };
            "password.email": { uri: "forgot-password"; methods: ["POST"] };
            "password.reset": {
                uri: "reset-password/{token}";
                methods: ["GET", "HEAD"];
            };
            "password.store": { uri: "reset-password"; methods: ["POST"] };
            "verification.notice": {
                uri: "verify-email";
                methods: ["GET", "HEAD"];
            };
            "verification.verify": {
                uri: "verify-email/{id}/{hash}";
                methods: ["GET", "HEAD"];
            };
            "password.confirm": {
                uri: "confirm-password";
                methods: ["GET", "HEAD"];
            };
            logout: { uri: "logout"; methods: ["POST"] };
            "competitions.index": {
                uri: "competitions";
                methods: ["GET", "HEAD"];
            };
            "tourneys.index": { uri: "tourneys"; methods: ["GET", "HEAD"] };
            "standings.index": { uri: "standings"; methods: ["GET", "HEAD"] };
            "game-server.index": {
                uri: "game-server";
                methods: ["GET", "HEAD"];
            };
            "settings.profile.edit": {
                uri: "settings/profile";
                methods: ["GET", "HEAD"];
            };
            "settings.profile.update": {
                uri: "settings/profile";
                methods: ["PUT"];
            };
            "settings.profile.setAvatar": {
                uri: "settings/profile";
                methods: ["POST"];
            };
            "settings.profile.removeAvatar": {
                uri: "settings/profile";
                methods: ["DELETE"];
            };
            "settings.account.edit": {
                uri: "settings/account";
                methods: ["GET", "HEAD"];
            };
            "settings.notifications.editBrowser": {
                uri: "settings/notifications/browser";
                methods: ["GET", "HEAD"];
            };
            "settings.notifications.editEmail": {
                uri: "settings/notifications/email";
                methods: ["GET", "HEAD"];
            };
        };
        wildcards: {
            "sanctum.*": [];
            "password.*": [];
            "verification.*": [];
            "competitions.*": [];
            "tourneys.*": [];
            "standings.*": [];
            "game-server.*": [];
            "settings.*": [];
            "settings.profile.*": [];
            "settings.account.*": [];
            "settings.notifications.*": [];
        };
    }
}
