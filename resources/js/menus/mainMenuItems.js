import { route, defineRoutes } from "momentum-trail";
import routes from "@/routes/routes.json";

defineRoutes(routes);

export default [
  { label: "Competitions", href: route("competitions.index") },
  { label: "Tourneys", href: route("tourneys.index") },
  { label: "Standings", href: route("standings.index") },
  { label: "Game Server", href: route("game-server.index") },
];
