let diagram = new dhx.Diagram("diagram_container", {
  type: "org",
  defaultShapeType: "img-card",
  scale: 0.9
});

diagram.data.load('<?php echo base_url();?>data.json');