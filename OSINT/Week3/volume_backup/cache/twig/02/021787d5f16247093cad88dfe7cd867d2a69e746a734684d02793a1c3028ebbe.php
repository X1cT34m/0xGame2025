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

/* partials/tools-scheduler.html.twig */
class __TwigTemplate_b515c0b5ddf5ae313258bcb163aa395e28d5787fe2972aa56f0c0b0f0bf8c415 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->urlFunc("plugin://admin/themes/grav/js/clipboard-helper.js"), "html", null, true);
        echo "\"></script>
<div class=\"scheduler-content\">

    ";
        // line 4
        $context["data"] = $this->getAttribute(($context["admin"] ?? null), "data", [0 => "config/scheduler"], "method");
        // line 5
        echo "    ";
        $context["cron_status"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "isCrontabSetup", [], "method");
        // line 6
        echo "    ";
        $context["user"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "whoami", [], "method");
        // line 7
        echo "    ";
        $context["webhook_enabled"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "isWebhookEnabled", [], "method");
        // line 8
        echo "    ";
        $context["active_triggers"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "getActiveTriggers", [], "method");
        // line 9
        echo "
    ";
        // line 10
        if ((twig_length_filter($this->env, ($context["active_triggers"] ?? null)) > 0)) {
            // line 11
            echo "        ";
            // line 12
            echo "        ";
            if ((twig_in_filter("webhook", ($context["active_triggers"] ?? null)) && !twig_in_filter("cron", ($context["active_triggers"] ?? null)))) {
                // line 13
                echo "            ";
                // line 14
                echo "            <div class=\"alert notice secondary-accent\">
                <div id=\"show-instructions\" class=\"button button-small button-outline float-right\"><i class=\"fa fa-clock-o\"></i> ";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_INSTALL_INSTRUCTIONS"), "html", null, true);
                echo "</div>
                <i class=\"fa fa-plug\"></i> <strong>Webhook Active</strong> - Scheduler is ready to receive webhook triggers
            </div>
        ";
            } elseif ((twig_in_filter("cron",             // line 18
($context["active_triggers"] ?? null)) && twig_in_filter("webhook", ($context["active_triggers"] ?? null)))) {
                // line 19
                echo "            ";
                // line 20
                echo "            <div class=\"alert notice secondary-accent\">
                <div id=\"show-instructions\" class=\"button button-small button-outline float-right\"><i class=\"fa fa-clock-o\"></i> ";
                // line 21
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_INSTALL_INSTRUCTIONS"), "html", null, true);
                echo "</div>
                <i class=\"fa fa-check\"></i> <strong>Cron & Webhook Active</strong> - Scheduler is running via cron and accepts webhook triggers
            </div>
        ";
            } elseif (twig_in_filter("cron",             // line 24
($context["active_triggers"] ?? null))) {
                // line 25
                echo "            ";
                // line 26
                echo "            <div class=\"alert notice secondary-accent\">
                <div id=\"show-instructions\" class=\"button button-small button-outline float-right\"><i class=\"fa fa-clock-o\"></i> ";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_INSTALL_INSTRUCTIONS"), "html", null, true);
                echo "</div>
                <i class=\"fa fa-check\"></i> ";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_INSTALLED_READY"), "html", null, true);
                echo "
            </div>
        ";
            }
            // line 31
            echo "    ";
        } elseif ((($context["cron_status"] ?? null) == 2)) {
            // line 32
            echo "        <div class=\"alert warning\"> ";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_CRON_NA", [0 => ($context["user"] ?? null)]);
            echo "</div>
    ";
        } else {
            // line 34
            echo "        <div class=\"alert warning\"> ";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_NOT_ENABLED", [0 => ($context["user"] ?? null)]);
            echo "</div>
    ";
        }
        // line 36
        echo "
    <div class=\"alert notice\"><i class=\"fa fa-exclamation-circle\"></i> ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_WARNING", [0 => ($context["user"] ?? null)]), "html", null, true);
        echo "</div>

    <div id=\"cron-install\" class=\"form-border overlay ";
        // line 39
        echo (((twig_length_filter($this->env, ($context["active_triggers"] ?? null)) > 0)) ? ("hide") : (""));
        echo "\">
        ";
        // line 40
        if (($context["webhook_enabled"] ?? null)) {
            // line 41
            echo "            <h3>Webhook Setup</h3>
            <p>The scheduler is configured to use webhooks. To trigger jobs via webhook:</p>
            
            ";
            // line 44
            $context["webhook_token"] = $this->getAttribute(($context["config"] ?? null), "get", [0 => "scheduler.modern.webhook.token"], "method");
            // line 45
            echo "            ";
            if ( !($context["webhook_token"] ?? null)) {
                // line 46
                echo "                ";
                $context["webhook_token"] = "YOUR_TOKEN";
                // line 47
                echo "            ";
            }
            // line 48
            echo "            <div class=\"form-input-wrapper form-input-addon-wrapper\" style=\"margin: 1rem 0;\">
                <textarea id=\"webhook-setup-cmd\" readonly rows=\"2\" style=\"font-family: monospace; background: #f8f9fa; border: 1px solid #dee2e6; padding: 0.375rem 0.75rem; resize: none; white-space: pre; border-radius: 4px 0 0 4px;\">curl -X POST \"";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute(($context["grav"] ?? null), "base_url_absolute", []), "html", null, true);
            echo "/scheduler/webhook\" \\
  -H \"Authorization: Bearer ";
            // line 50
            echo twig_escape_filter($this->env, ($context["webhook_token"] ?? null), "html", null, true);
            echo "\"</textarea>
                <div class=\"form-input-addon form-input-append\" style=\"cursor: pointer; background: #e9ecef; border: 1px solid #dee2e6; border-left: 0; padding: 0.375rem 0.75rem; display: inline-flex; align-items: center; border-radius: 0 4px 4px 0;\" onclick=\"GravClipboard.copy(this)\">
                    <i class=\"fa fa-copy\" style=\"margin-right: 0.25rem;\"></i> Copy
                </div>
            </div>
            
            <p>Make sure the <strong>scheduler-webhook</strong> plugin is installed and enabled.</p>
            
            <hr>
            <h3>Alternative: Cron Setup</h3>
        ";
        }
        // line 61
        echo "        
        <div class=\"form-input-wrapper form-input-addon-wrapper\" style=\"margin: 1rem 0;\">
            <input type=\"text\" id=\"cron-setup-cmd\" readonly value=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "getCronCommand", [], "method")), "html", null, true);
        echo "\" style=\"font-family: monospace; background: #f8f9fa; border: 1px solid #dee2e6; padding: 0.375rem 0.75rem; border-radius: 4px 0 0 4px;\">
            <div class=\"form-input-addon form-input-append\" style=\"cursor: pointer; background: #e9ecef; border: 1px solid #dee2e6; border-left: 0; padding: 0.375rem 0.75rem; display: inline-flex; align-items: center; border-radius: 0 4px 4px 0;\" onclick=\"GravClipboard.copy(this)\">
                <i class=\"fa fa-copy\" style=\"margin-right: 0.25rem;\"></i> Copy
            </div>
        </div>

        <p>";
        // line 69
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SCHEDULER_POST_INSTRUCTIONS", [0 => ($context["user"] ?? null)]);
        echo "</p>
    </div>

    ";
        // line 72
        $this->loadTemplate("partials/blueprints.html.twig", "partials/tools-scheduler.html.twig", 72)->display(twig_array_merge($context, ["blueprints" => $this->getAttribute(($context["data"] ?? null), "blueprints", []), "data" => ($context["data"] ?? null)]));
        // line 73
        echo "
    ";
        // line 74
        $this->loadTemplate("partials/modal-changes-detected.html.twig", "partials/tools-scheduler.html.twig", 74)->display($context);
        // line 75
        echo "
    <script>
        \$('#show-instructions').click(function() {
            \$('#cron-install').toggleClass( \"hide\" );
        });
    </script>

</div>
";
    }

    public function getTemplateName()
    {
        return "partials/tools-scheduler.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 75,  192 => 74,  189 => 73,  187 => 72,  181 => 69,  172 => 63,  168 => 61,  154 => 50,  150 => 49,  147 => 48,  144 => 47,  141 => 46,  138 => 45,  136 => 44,  131 => 41,  129 => 40,  125 => 39,  120 => 37,  117 => 36,  111 => 34,  105 => 32,  102 => 31,  96 => 28,  92 => 27,  89 => 26,  87 => 25,  85 => 24,  79 => 21,  76 => 20,  74 => 19,  72 => 18,  66 => 15,  63 => 14,  61 => 13,  58 => 12,  56 => 11,  54 => 10,  51 => 9,  48 => 8,  45 => 7,  42 => 6,  39 => 5,  37 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<script src=\"{{ url('plugin://admin/themes/grav/js/clipboard-helper.js') }}\"></script>
<div class=\"scheduler-content\">

    {% set data = admin.data('config/scheduler') %}
    {% set cron_status = grav.scheduler.isCrontabSetup() %}
    {% set user = grav.scheduler.whoami() %}
    {% set webhook_enabled = grav.scheduler.isWebhookEnabled() %}
    {% set active_triggers = grav.scheduler.getActiveTriggers() %}

    {% if active_triggers|length > 0 %}
        {# We have at least one active trigger method #}
        {% if 'webhook' in active_triggers and 'cron' not in active_triggers %}
            {# Webhook only mode #}
            <div class=\"alert notice secondary-accent\">
                <div id=\"show-instructions\" class=\"button button-small button-outline float-right\"><i class=\"fa fa-clock-o\"></i> {{ \"PLUGIN_ADMIN.SCHEDULER_INSTALL_INSTRUCTIONS\"|t }}</div>
                <i class=\"fa fa-plug\"></i> <strong>Webhook Active</strong> - Scheduler is ready to receive webhook triggers
            </div>
        {% elseif 'cron' in active_triggers and 'webhook' in active_triggers %}
            {# Both cron and webhook #}
            <div class=\"alert notice secondary-accent\">
                <div id=\"show-instructions\" class=\"button button-small button-outline float-right\"><i class=\"fa fa-clock-o\"></i> {{ \"PLUGIN_ADMIN.SCHEDULER_INSTALL_INSTRUCTIONS\"|t }}</div>
                <i class=\"fa fa-check\"></i> <strong>Cron & Webhook Active</strong> - Scheduler is running via cron and accepts webhook triggers
            </div>
        {% elseif 'cron' in active_triggers %}
            {# Cron only #}
            <div class=\"alert notice secondary-accent\">
                <div id=\"show-instructions\" class=\"button button-small button-outline float-right\"><i class=\"fa fa-clock-o\"></i> {{ \"PLUGIN_ADMIN.SCHEDULER_INSTALL_INSTRUCTIONS\"|t }}</div>
                <i class=\"fa fa-check\"></i> {{ \"PLUGIN_ADMIN.SCHEDULER_INSTALLED_READY\"|t }}
            </div>
        {% endif %}
    {% elseif cron_status == 2 %}
        <div class=\"alert warning\"> {{ \"PLUGIN_ADMIN.SCHEDULER_CRON_NA\"|t([user])|raw }}</div>
    {% else %}
        <div class=\"alert warning\"> {{ \"PLUGIN_ADMIN.SCHEDULER_NOT_ENABLED\"|t([user])|raw }}</div>
    {% endif %}

    <div class=\"alert notice\"><i class=\"fa fa-exclamation-circle\"></i> {{ \"PLUGIN_ADMIN.SCHEDULER_WARNING\"|t([user]) }}</div>

    <div id=\"cron-install\" class=\"form-border overlay {{ (active_triggers|length > 0) ? 'hide' : ''}}\">
        {% if webhook_enabled %}
            <h3>Webhook Setup</h3>
            <p>The scheduler is configured to use webhooks. To trigger jobs via webhook:</p>
            
            {% set webhook_token = config.get('scheduler.modern.webhook.token') %}
            {% if not webhook_token %}
                {% set webhook_token = 'YOUR_TOKEN' %}
            {% endif %}
            <div class=\"form-input-wrapper form-input-addon-wrapper\" style=\"margin: 1rem 0;\">
                <textarea id=\"webhook-setup-cmd\" readonly rows=\"2\" style=\"font-family: monospace; background: #f8f9fa; border: 1px solid #dee2e6; padding: 0.375rem 0.75rem; resize: none; white-space: pre; border-radius: 4px 0 0 4px;\">curl -X POST \"{{ grav.base_url_absolute }}/scheduler/webhook\" \\
  -H \"Authorization: Bearer {{ webhook_token }}\"</textarea>
                <div class=\"form-input-addon form-input-append\" style=\"cursor: pointer; background: #e9ecef; border: 1px solid #dee2e6; border-left: 0; padding: 0.375rem 0.75rem; display: inline-flex; align-items: center; border-radius: 0 4px 4px 0;\" onclick=\"GravClipboard.copy(this)\">
                    <i class=\"fa fa-copy\" style=\"margin-right: 0.25rem;\"></i> Copy
                </div>
            </div>
            
            <p>Make sure the <strong>scheduler-webhook</strong> plugin is installed and enabled.</p>
            
            <hr>
            <h3>Alternative: Cron Setup</h3>
        {% endif %}
        
        <div class=\"form-input-wrapper form-input-addon-wrapper\" style=\"margin: 1rem 0;\">
            <input type=\"text\" id=\"cron-setup-cmd\" readonly value=\"{{ grav.scheduler.getCronCommand()|trim }}\" style=\"font-family: monospace; background: #f8f9fa; border: 1px solid #dee2e6; padding: 0.375rem 0.75rem; border-radius: 4px 0 0 4px;\">
            <div class=\"form-input-addon form-input-append\" style=\"cursor: pointer; background: #e9ecef; border: 1px solid #dee2e6; border-left: 0; padding: 0.375rem 0.75rem; display: inline-flex; align-items: center; border-radius: 0 4px 4px 0;\" onclick=\"GravClipboard.copy(this)\">
                <i class=\"fa fa-copy\" style=\"margin-right: 0.25rem;\"></i> Copy
            </div>
        </div>

        <p>{{ \"PLUGIN_ADMIN.SCHEDULER_POST_INSTRUCTIONS\"|t([user])|raw }}</p>
    </div>

    {% include 'partials/blueprints.html.twig' with { blueprints: data.blueprints, data: data } %}

    {% include 'partials/modal-changes-detected.html.twig' %}

    <script>
        \$('#show-instructions').click(function() {
            \$('#cron-install').toggleClass( \"hide\" );
        });
    </script>

</div>
", "partials/tools-scheduler.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/tools-scheduler.html.twig");
    }
}
