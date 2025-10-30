<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* forms/fields/webhook-status/webhook-status.html.twig */
class __TwigTemplate_fd8c957f77a602d46ea5f70a133a606fbace3beaee1b2ab2a22589b6dc91e52f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/webhook-status/webhook-status.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = [])
    {
        // line 4
        echo "    <div class=\"webhook-status-field\">
        ";
        // line 5
        $context["plugin_exists"] = $this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", [], "any", false, true), "scheduler-webhook", [], "array", true, true);
        // line 6
        echo "        ";
        $context["plugin_enabled"] = (($context["plugin_exists"] ?? null) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "scheduler-webhook", [], "array"), "enabled", []));
        // line 7
        echo "        
        ";
        // line 8
        if ( !($context["plugin_exists"] ?? null)) {
            // line 9
            echo "            ";
            // line 10
            echo "            <div class=\"alert alert-warning\">
                <strong>Webhook Plugin Required</strong><br>
                The <code>scheduler-webhook</code> plugin is required for webhook functionality.<br><br>
                <a class=\"button button-primary\" href=\"";
            // line 13
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "/plugins/install/scheduler-webhook\">
                    <i class=\"fa fa-download\"></i> Install Plugin Now
                </a>
                <span class=\"hint\" style=\"margin-left: 10px;\">or run: <code>bin/gpm install scheduler-webhook</code></span>
            </div>
        ";
        } elseif ( !        // line 18
($context["plugin_enabled"] ?? null)) {
            // line 19
            echo "            ";
            // line 20
            echo "            <div class=\"alert alert-info\">
                <i class=\"fa fa-info-circle\"></i> <strong>Webhook Plugin Installed</strong><br>
                The scheduler-webhook plugin is installed but disabled. 
                <a href=\"";
            // line 23
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "/plugins/scheduler-webhook\">Enable it in plugin settings</a> to use webhook functionality.
            </div>
        ";
        } else {
            // line 26
            echo "            ";
            // line 27
            echo "            <div class=\"alert alert-success\">
                <i class=\"fa fa-check-circle\"></i> <strong>Webhook Plugin Ready!</strong><br>
                The scheduler-webhook plugin is installed and active. Configure your webhook settings below.
            </div>
        ";
        }
        // line 32
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/webhook-status/webhook-status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 32,  87 => 27,  85 => 26,  79 => 23,  74 => 20,  72 => 19,  70 => 18,  62 => 13,  57 => 10,  55 => 9,  53 => 8,  50 => 7,  47 => 6,  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/field.html.twig\" %}

{% block field %}
    <div class=\"webhook-status-field\">
        {% set plugin_exists = config.plugins['scheduler-webhook'] is defined %}
        {% set plugin_enabled = plugin_exists and config.plugins['scheduler-webhook'].enabled %}
        
        {% if not plugin_exists %}
            {# Plugin not installed #}
            <div class=\"alert alert-warning\">
                <strong>Webhook Plugin Required</strong><br>
                The <code>scheduler-webhook</code> plugin is required for webhook functionality.<br><br>
                <a class=\"button button-primary\" href=\"{{ base_url_relative }}/plugins/install/scheduler-webhook\">
                    <i class=\"fa fa-download\"></i> Install Plugin Now
                </a>
                <span class=\"hint\" style=\"margin-left: 10px;\">or run: <code>bin/gpm install scheduler-webhook</code></span>
            </div>
        {% elseif not plugin_enabled %}
            {# Plugin installed but disabled #}
            <div class=\"alert alert-info\">
                <i class=\"fa fa-info-circle\"></i> <strong>Webhook Plugin Installed</strong><br>
                The scheduler-webhook plugin is installed but disabled. 
                <a href=\"{{ base_url_relative }}/plugins/scheduler-webhook\">Enable it in plugin settings</a> to use webhook functionality.
            </div>
        {% else %}
            {# Plugin installed and enabled #}
            <div class=\"alert alert-success\">
                <i class=\"fa fa-check-circle\"></i> <strong>Webhook Plugin Ready!</strong><br>
                The scheduler-webhook plugin is installed and active. Configure your webhook settings below.
            </div>
        {% endif %}
    </div>
{% endblock %}", "forms/fields/webhook-status/webhook-status.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/webhook-status/webhook-status.html.twig");
    }
}
