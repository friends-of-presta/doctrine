import Grid from '../../../../../../admin-dev/themes/new-theme/js/components/grid/grid';
import FiltersResetExtension
  from "../../../../../../admin-dev/themes/new-theme/js/components/grid/extension/filters-reset-extension";
import SortingExtension
  from "../../../../../../admin-dev/themes/new-theme/js/components/grid/extension/sorting-extension";
import ReloadListExtension
  from "../../../../../../admin-dev/themes/new-theme/js/components/grid/extension/reload-list-extension";
import ExportToSqlManagerExtension
  from "../../../../../../admin-dev/themes/new-theme/js/components/grid/extension/export-to-sql-manager-extension";

const $ = window.$;

$(document).ready(() => {
  const demoGrid = new Grid('demo_entity');

  demoGrid.addExtension(new FiltersResetExtension());
  demoGrid.addExtension(new SortingExtension());
  demoGrid.addExtension(new ReloadListExtension());
  demoGrid.addExtension(new ExportToSqlManagerExtension());
});
