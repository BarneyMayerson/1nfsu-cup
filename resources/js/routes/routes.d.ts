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
                parameters: ["token"];
            };
            "password.store": { uri: "reset-password"; methods: ["POST"] };
            "verification.notice": {
                uri: "verify-email";
                methods: ["GET", "HEAD"];
            };
            "verification.verify": {
                uri: "verify-email/{id}/{hash}";
                methods: ["GET", "HEAD"];
                parameters: ["id", "hash"];
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
            "public-profile-404": { uri: "profile"; methods: ["GET", "HEAD"] };
            "public-profile": {
                uri: "profile/{name}";
                methods: ["GET", "HEAD"];
                parameters: ["name"];
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
                uri: "settings/profile/avatar";
                methods: ["POST"];
            };
            "settings.profile.removeAvatar": {
                uri: "settings/profile/avatar";
                methods: ["DELETE"];
            };
            "settings.account.edit": {
                uri: "settings/account";
                methods: ["GET", "HEAD"];
            };
            "settings.account.delete": {
                uri: "settings/account/delete";
                methods: ["GET", "HEAD"];
            };
            "settings.account.destroy": {
                uri: "settings/account";
                methods: ["DELETE"];
            };
            "settings.account.email.edit": {
                uri: "settings/account/email";
                methods: ["GET", "HEAD"];
            };
            "settings.account.email.update": {
                uri: "settings/account/email";
                methods: ["POST"];
            };
            "settings.account.name.edit": {
                uri: "settings/account/name";
                methods: ["GET", "HEAD"];
            };
            "settings.account.name.update": {
                uri: "settings/account/name";
                methods: ["POST"];
            };
            "settings.account.password.edit": {
                uri: "settings/account/password";
                methods: ["GET", "HEAD"];
            };
            "settings.account.password.update": {
                uri: "settings/account/password";
                methods: ["POST"];
            };
            "settings.notifications.editBrowser": {
                uri: "settings/notifications/browser";
                methods: ["GET", "HEAD"];
            };
            "settings.notifications.editEmail": {
                uri: "settings/notifications/email";
                methods: ["GET", "HEAD"];
            };
            "cabinet.index": { uri: "cabinet"; methods: ["GET", "HEAD"] };
            "cabinet.tourneys.index": {
                uri: "cabinet/tourneys";
                methods: ["GET", "HEAD"];
            };
            "cabinet.tourneys.create": {
                uri: "cabinet/tourneys/create";
                methods: ["GET", "HEAD"];
            };
            "cabinet.tourneys.store": {
                uri: "cabinet/tourneys";
                methods: ["POST"];
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
            "settings.account.email.*": [];
            "settings.account.name.*": [];
            "settings.account.password.*": [];
            "settings.notifications.*": [];
            "cabinet.*": [];
            "cabinet.tourneys.*": [];
        };
    }
}
