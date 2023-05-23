(function (blocks, element, components) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var TextControl = components.TextControl;
  var ServerSideRender = components.ServerSideRender;

  registerBlockType("gracoltheme/project-config", {
    title: "Configuración de proyecto",
    icon: "smiley",
    category: "common",

    attributes: {
      metaField: {
        type: "string",
        default: "",
      },
    },

    edit: function (props) {
      var metaField = props.attributes.metaField;

      function onChangeMetaField(value) {
        props.setAttributes({ metaField: value });
      }

      return el(
        "div",
        { className: "project-config" },
        el(TextControl, {
          label: "Campo de metadatos",
          value: metaField,
          onChange: onChangeMetaField,
        }),
        el(ServerSideRender, {
          block: "gracoltheme/project-config",
          attributes: props.attributes,
        })
      );
    },

    save: function () {
      return null; // El bloque no tiene salida visible en el front-end
    },
  });
})(window.wp.blocks, window.wp.element, window.wp.components);
